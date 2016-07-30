<?php 

if(!isset($_SESSION)){
    session_start();
    $_SESSION['pop1'] = 1;
}
include("include/connectsql.php");

?>
<!DOCTYPE html>
	<html lang="en">
<head>
 <meta charset="utf-8">
<title> login </title>
<link href="style.css" media="screen" rel="stylesheet">
	</head>
	
   <body>
<div class="container mlogin">
<div id="login">
<h1>Enter</h1>
<form action="" id="loginform" method="post" name="loginform">
<p><label for="user_login">Username<br>
<input class="input" id="username" name="username" size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Password<br>
 <input class="input" id="password" name="password" size="20"
  type="password" value=""></label></p> 
	<p class="submit"><input class="button" name="login" type= "submit" value="Sign in"></p>
	<p class="regtext">Still not registered?<a href= "register.php"><br>Register!</a></p>
   </form>
 </div>
  </div>

</body>
</html>

<?php

	
	if(isset($_SESSION["session_username"])){
	// вывод "Session is set"; // в целях проверки, зачем?
	header("Location: index.php");
	}

	if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query = mysqli_query($link, "SELECT * FROM users_db WHERE username='".$username."' AND password='".$password."'") or mysqli_error($link);
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {

  $dbusername=$row['username'];
  $dbpassword=$row['password'];

 }
  if($username == $dbusername && $password == $dbpassword)
 {

	 $_SESSION['session_username']=$username;	

 /* Перенаправление браузера */
   header("Location: index.php");
	}
	} else {
	//  $message = "Invalid username or password!";
	
	echo  "Invalid username or password!";
 }
	} else {
    $message = "All fields are required!";
	}
	}
	?>