<?php

$DOMAIN = 'http://localhost/qr/qr_js/images/';
//$DOMAIN = 'http://iwantoutsource.com/qr_user/images/';

function upload_qr($x,$y)
{
	$DOMAIN = 'http://localhost/qr/qr_js/images/';
	//$DOMAIN = 'http://iwantoutsource.com/qr_user/images/';
	$rootUrl = $x;
	$rootUrls = str_replace(" ", "+", $rootUrl);
	$up_rootUrls = 'images/' . $y .'/adquest_qr.png';
	file_put_contents($up_rootUrls, fopen($rootUrls, 'r'));
	
	// get file in folder
	$files1 = scandir("images/" . $y);
	$link 	= $DOMAIN . $y. '/';
	$files2 = $link.$files1['2'];

	return $files2;
}

if(isset($_POST['path_url']))
{
	echo upload_qr($_POST['path_url'],'url');
}

if(isset($_POST['path_vcard']))
{

	$content = urlencode($_POST['path_vcard']);

	// form google chart api link
	$rootUrl = "http://chart.googleapis.com/chart?cht=qr&chs=320x320&chl=$content&choe=UTF-8&chld=L";

	$rootUrls = str_replace(" ", "+", $rootUrl);
	file_put_contents("images/vcard/adquest_qr.png", fopen($rootUrls, 'r'));
	
	// get file in folder
	$files1 = scandir('images/vcard');
	$link 	= $DOMAIN . 'vcard/';
	$files2 = $link.$files1['2'];

	echo $files2;
}

if(isset($_POST['path_text']))
{
	echo upload_qr($_POST['path_text'],'text');
}

if(isset($_POST['path_email']))
{
	echo upload_qr($_POST['path_email'],'email');
}

if(isset($_POST['path_sms']))
{
	echo upload_qr($_POST['path_sms'],'sms');
}

if(isset($_POST['path_facebook']))
{
	echo upload_qr($_POST['path_facebook'],'facebook');
}

?>