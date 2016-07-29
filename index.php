<?php
require_once "include/captcha.php";

?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<html>
<head>
  <title>Форма</title>
		
<script src="js/jquery.min.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"> </script>
<script src="js/mygeo.js"></script>

 </head>
<body class = "coolpages">

<?php

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:

?>




<div class = center>

<form action=process.php method="post" onsubmit="return process_form(this)" enctype="multipart/form-data">
<p>Напишите отзыв:<br>
<input class="input2" type="text" name="msg1" id="msgid" /></p>
<p>Подпишитесь:<br>
<input class="input2" type="text" name="name" id="nameid"/></p>
<p>Загрузите ваш аватар:<br>
<input type="file" name="filename" style="margin-top: 4px"></p>
<p>Ваше раположение:<br>
<input class="input2" type="text" name="geo" id="geoid" /></p>
<p>Введите капчу:<br>
<span style="background:white; font-size: 36px; margin-right: 10px; "><?=$_SESSION['outputrand'] ?></span><input class="input2" type="text" name="norobot" style="width: 50px" /><input type ="submit" id="submitid" class="button2" value="Sign in"/></p></form>
<a href="submitions.php" name="test">Посмотреть отзывы</a> 

</div>

<div class="b-popup" onclick="javascript:PopUpHide();" id="popup2">
<div class="b-popup-content2" >
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="logout.php">Выйти</a> из системы</p>
    </div>
</div>

<br>
<div id="map" style="width:400px; height:300px"></div>

<!-- очищаем сесионную переменую, но зачем? //-->
<?php unset ($_SESSION['outputrand']);?>



<script>

var process_form = document.getElementById("submitid").onclick
process_form = function(event)
{
var name = document.getElementById("nameid").value;
var msg1 = document.getElementById("msgid").value;

if (name == "" || msg1 == "")
{

alert("Please, fill out the form properly!");
return false;
}
}

$(document).ready(function(){
    PopUpHide();
});
function PopUpShow(){
    $("#popup2").show();
}
function PopUpHide(){
    $("#popup2").hide();
}

 </script>

 </body>

<?php endif; ?>