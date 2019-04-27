<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("481125903701-dv7eb5phg7m9v2m2su8uk0ifb6c23p6g.apps.googleusercontent.com");
	$gClient->setClientSecret("_xU0Lbvt7MZPdJvbum_IcFTm");
	$gClient->setApplicationName("Get-Me-There");
	$gClient->setRedirectUri("http://localhost/Get-Me-There/signIn.html");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
