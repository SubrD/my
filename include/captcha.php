<?php
if(!isset($_SESSION)){
    session_start();
}

	$myrand = rand(500, 9999);
	$_SESSION['rand'] = md5($myrand);
    $_SESSION['outputrand'] = $myrand
	?>