<link rel="stylesheet" type="text/css" href="style.css">

<?php

include 'connectsql.php';
include 'table_output.php';

$query = "SELECT id, img, name, message, geo, date FROM $table WHERE name != '' AND message != '' ";
$query2 = "SELECT id, img, name, message, geo, date FROM $tableX WHERE name != '' AND message != '' ";
$query3 = "SELECT id, img, name, message, geo, date FROM $tableY WHERE name != '' AND message != '' ";

$res = mysqli_query($link, $query) or die(mysqli_error($link));
$res2 = mysqli_query($link, $query2) or die(mysqli_error($link));
$res3 = mysqli_query($link, $query3) or die(mysqli_error($link));

myoutput($res, "Main Table", "tstyle1");
myoutput($res2, "Таблица 1", "tstyle2");
myoutput($res3, "Таблица 2", "tstyle3");

mysqli_close($link);
 

echo ("<a href=\"index.php\">Вернуться</a>");


?>