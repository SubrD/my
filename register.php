

<?php 

include("include/header.php");
include("include/connectsql.php");

?>

<div class="container mregister">
<div id="login">
 <h1>Registration form</h1>
<form action="register.php" id="registerform" method="post" name="registerform">
<p><label for="user_pass">E-mail<br>
<input class="input" id="email" name="email" size="32" type="email" value=""></label></p>
<p><label for="user_pass">Username<br>
<input class="input" id="username" name="username" size="20" type="text" value=""></label></p>
<p><label for="user_pass">Password<br>
<input class="input" id="password" name="password" size="32"   type="password" value=""></label></p>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Register now!"></p>
	  <p class="regtext">Already registered? <a href= "login.php"><br>Sign in!</a></p>
 </form>
</div>
</div>
</body>
</html>

<?php
	
	if(isset($_POST["register"])){
	

	//nice one!
	if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
 
 $email=htmlspecialchars($_POST['email']);
 $username=htmlspecialchars($_POST['username']);
 $password=htmlspecialchars($_POST['password']);
 $query=mysqli_query($link, "SELECT * FROM users_db WHERE username='".$username."'");
 $numrows=mysqli_num_rows($query);
if($numrows==0)
   {
	$sql="INSERT INTO users_db (email, username, password) VALUES ('$email', '$username', '$password')";
  $result=mysqli_query($link, $sql) or mysqli_error($link);
 if($result){
	$message = "Account Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
	} else {
	$message = "That username already exists! Please try another one!";
   }
	} else {
	$message = "All fields are required!";
	}
	}

 if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} 



 ?>