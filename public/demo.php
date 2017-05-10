<?php
require_once 'Jftong.php';
if (isset($_POST['dosubmit']) && $_POST['dosubmit']) {
    $obj    = new Jftong();
    $params = $_POST;
    $obj->createpay($params);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>充值提交表单</title>
    </head>
    <body>
        <h2>捷付通 PHP Demo</h2>
        <form method="post" action="">
            <table border="1" cellpadding="5" width="500px">
                <tr>
                    <td>系统单号</td>
                    <td><input type="text" name="orderno" value="<?php echo time(); ?>" readonly></td>
                </tr>
                <tr>
                    <td>商品名</td>
                    <td><input type="text" name="productname" value="php支付接口在线测试" readonly></td>
                </tr>
                <tr>
                    <td>支付金额</td>
                    <td><input type="text" name="amount" value="0.1">元</td>
                </tr>
                <tr>
                    <td>支付方式</td>
                    <td><select name="payment">
                        <option value="ALIPAY">支付宝</option>
                    </select></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" name="dosubmit" value="1">提交支付订单</button>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
