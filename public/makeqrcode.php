<?php
require_once('qrcode.class.php');
$text = isset($_GET['text']) ? $_GET['text'] : '';
if(!$text){
	echo 'error';
	die();
}
$text = urldecode($text);
QRcode::png($text,false,QR_ECLEVEL_M,8,2);
?>