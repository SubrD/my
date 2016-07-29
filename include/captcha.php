<?php
	session_start(); //зачем?
 
	$myrand = rand(500, 9999);
	$_SESSION['rand'] = md5($myrand);
    $_SESSION['outputrand'] = $myrand
	?>