<?php
session_start();
if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:

?>

<link rel="stylesheet" type="text/css" href="style.css">
<body class = "coolpages">

<?php

include 'include/connectsql.php';
include 'include/table_output.php';

$query = "SELECT id, img, name, message, geo, date FROM $table WHERE name != '' AND message != '' ";
$query2 = "SELECT id, img, name, message, geo, date FROM $tableX WHERE name != '' AND message != '' ";
$query3 = "SELECT id, img, name, message, geo, date FROM $tableY WHERE name != '' AND message != '' ";

$res = mysqli_query($link, $query) or myerror($table, $link);
$res2 = mysqli_query($link, $query2) or myerror($tableX, $link);
$res3 = mysqli_query($link, $query3) or myerror($tableY, $link);

myoutput($res, "Main Table", "tstyle1");
myoutput($res2, "Таблица 1", "tstyle2");
myoutput($res3, "Таблица 2", "tstyle3");

mysqli_close($link);
 

echo ("<a href=\"index.php\">Вернуться</a>");


?>

</body class = "coolpages">

<?php endif; ?>