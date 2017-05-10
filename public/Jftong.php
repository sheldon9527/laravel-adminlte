<?php
/**
 * 捷付通支付类
 * 
 * @author ZHW
 *        
 */
class Jftong
{
    public static $retransferURL = "http://www.jftongtrans.com:18081/transfer/pretransfer";
    public static $createsessionURL = "http://www.jftongtrans.com:18081/order/createsession";
    public static $transorderURL = "http://www.jftongtrans.com:18081/order/transorder";

    private $merno = '10000'; // 商户号
    private $appno = '10000'; // 应用编号
    private $privateKeyPath = './privatekey.pem'; // 私钥证书路径，需使用pkcs1格式证书

    public function __construct(){

    }

    /**
     * 创建支付表单
     * @data        表单内容
     * @gateway 支付网关地址
     */
    public function buildForm($data) {
        $topayUrl = 'topay.php?qrcode='.urlencode($data['qrcodeUrl']).'&orderno='.$data['orderno'].'&title='.urlencode($data['title']).'&payment='.urlencode($data['payment']).'&amount='.$data['amount'];
        header("location: {$topayUrl}"); 
    }


    // 创建支付接口下单
    public function createpay($param){
        $transdata = array(
            'merchantno' => $this->merno,
            'appno' => $this->appno,
            'merchantorder' => $param['orderno'], //应用内订单号
            'amount' => $param['amount'], // 交易金额
            'currency' => 'RMB', // 交易币种
            'itemno' => $param['orderno'], // 应用内订单号
            'itemname' => $param['productname'], // 商品名
            'customerno' => '1',
            'notifyurl' => 'http://www.yoursite.com/paycallback.php' // 支付成功通知地址
        );

        $resdata = $this->sendpost(self::$retransferURL,$transdata);
        $transdata = json_decode($resdata['transdata'],TRUE);
        $serialno = $transdata['serialno'];

        $paytype = '';
        $paymentTitle = '';
        // 支付方式 paytype：2 支付宝  , 
        if($param['payment'] == 'ALIPAY'){
            $paytype = 2;
            $paymentTitle = '支付宝';
        }

        $transdata = array(
            'serialno' => $serialno
        );
        $resdata = $this->sendpost(self::$createsessionURL,$transdata);
        $transdata = json_decode($resdata['transdata'],TRUE);
        $sessionid = $transdata['sessionid'];
        if(!$sessionid){
            echo 'sessionid 为空，不可下单';
            die();
        }

        $transdata = array(
            'sessionid' => $sessionid,
            'paytype' => $paytype
        );
        $resdata = $this->sendpost(self::$transorderURL,$transdata);
        $transdata = json_decode($resdata['transdata'],TRUE);
        $payparamCode = $transdata['resultinfo']['payparam'];
        if(!$payparamCode){
            echo '支付接口二维码获取失败，请重试！';
            die();
        }
        $payparam = json_decode(base64_decode($payparamCode),TRUE);
        $qrcodeUrl = $payparam['url'];

        // 构建扫码页面参数
        $paydata = array(
            'qrcodeUrl' => $qrcodeUrl,
            'orderno' => $param['orderno'],
            'title' => $param['productname'],
            'payment' => $paymentTitle,
            'amount' => $param['amount']
        );
        $this->buildForm($paydata);
    }

    // 支付通知校验方法
    public function notifycheck(&$result){
        $data = file_get_contents('php://input');

        $resdata = $this->apiresolve($data);
        $transdataStr = $resdata['transdata'];
        $transdataSign = $resdata['sign'];

        $_sign = $this->sign($transdataStr);
        $tradeResult = '';
        if($transdataSign == $_sign){
        	// 判断支付结果
        	$transdata = json_decode($resdata['transdata'],TRUE);
        	if($transdata['result'] == 2){
        		// 支付结果成功
        		$tradeResult = 'ok';
        		$result = $transdata;
        	}else{
        		// 支付结果失败
        		$tradeResult = 'pay result not success';
        		$result = array();
        	}
        }else{
            $tradeResult = 'sign error';
            $result = array();
        }
        return $tradeResult;
    }


    private function sendpost($url,$transdata){ // 模拟提交数据函数

        $transdataStr = json_encode($transdata,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $sign = urlencode($this->sign($transdataStr));
        $transdataStr = urlencode($transdataStr);
        $postdata = "transdata={$transdataStr}&sign={$sign}&signtype=RSA";

        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)'); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_COOKIE, '');
        curl_setopt($curl, CURLOPT_REFERER,'');// 设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 13); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
           echo 'Errno'.curl_error($curl);//捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
        return $this->apiresolve($tmpInfo); // 返回数据
    }

    private function sign($data='')
    {
        if (empty($data))
        {
            return False;
        }

        // 私钥文件的路径
        $privateKeyPath = $this->privateKeyPath;
        $private_key = file_get_contents($privateKeyPath);
        if (empty($private_key))
        {
            echo "Private Key error!";
            return False;
        }

        $pkeyid = openssl_get_privatekey($private_key);
        if (empty($pkeyid))
        {
            echo "private key resource identifier False!";
            return False;
        }

        $verify = openssl_sign($data, $signature, $pkeyid, OPENSSL_ALGO_MD5);
        openssl_free_key($pkeyid);
        return base64_encode($signature);
    }

    // 接口返回数据解析
    private function apiresolve($res){
        if(strpos($res,'transdata') === FALSE){
            // 接口失败
            echo $res;
            die();
        }else{
            // 接口成功
            $resarray = explode('&',$res);
            $resdata = array();
            foreach ($resarray as $row) {
                $a = explode('=', $row);
                $resdata[$a[0]] = urldecode($a[1]);
            }
            return $resdata;
        }
    }

}