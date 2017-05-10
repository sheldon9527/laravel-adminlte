<?php
$payment = urldecode($_GET['payment']);
$title = urldecode($_GET['title']);
$amount = urldecode($_GET['amount']);
$qrcodeurlcode = urldecode($_GET['qrcode']);
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<title>扫一扫充值</title>
	</head>
	<body>
		<div class="main clearfix">
			<div class="container-fluid">
				<div class="row slogo">
					<div class="col-xs-12 text-center">
						
					</div>
				</div>
					<table class="paytable table table-bordered">
						<tr>
							<td colspan="3">
								<div class="topay">
									<h3><?php echo $title ?></h3>
									<h4>充值金额：<?php echo $amount ?> 元</h4>
									<div class="qrcode">
										<img src="<?php echo 'makeqrcode.php?text='.$qrcodeurlcode; ?>" width="220" id="qrcodeimg">
										<p class="paytips">
											请使用<?php echo $payment ?>APP扫码支付<br>
										</p>
									</div>
								</div>
							</td>
						</tr>
					</table>
			</div>
		</div>
	</body>
</html>