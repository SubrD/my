<?php

require_once "captcha.php";
?>


<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<html>
<head>
  <title>Форма</title>
 </head>
 <body>

<div class = center>

<form action=process.php method="post" onsubmit="return process_form(this)" enctype="multipart/form-data">
Напишите отзыв:

<input type = "text" name="msg1" id="msgid"/>
<br><br>

Подпишитесь:
<input type = "text" name="name" id="nameid"/>
<br><br>
Загрузите ваш аватар: <input type="file" name="filename">
<br><br>
Введите капчу:

<input class="input" type="text" name="norobot" />
		<br><br><span style="background:white; font-size: 27px; "><?=$_SESSION['outputrand'] ?></span>
		<input type ="submit" id="submitid" Click here/>
<br><br></form>


<a href="submitions.php" name="test">Посмотреть отзывы</a> 


</div>

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

 </script>

 </body>

