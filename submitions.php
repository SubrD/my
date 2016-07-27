<link rel="stylesheet" type="text/css" href="style.css">

<?php

include 'connectsql.php';



$table = "testB";


$query = "SELECT id, name, message, date FROM $table WHERE name != '' AND message != '' ";
 

$res = mysqli_query($link, $query) or die(mysqli_error($link));
 
// Выводим данные

echo ("
<!DOCTYPE html>
 
<head>
 
    <title>Вывод данных из MySQL</title>
 

 
</head>
 
<body>
 
<h3>Вывод</h3>
 
<table border=\"1\">
  <td align=\"center\"><b>#</b></td>
  <td align=\"center\"><b>Дата</b></td>
  <td align=\"center\"><b>Имя</b></td>
  <td align=\"center\"><b>Сообщение</b></td>
 </tr>
");
 
while ($row = mysqli_fetch_array($res)) {
    echo "<tr>\n";
    echo "<td>".$row['id']."</td>\n";
    echo "<td>".$row['date']."</td>\n";
    echo "<td>".$row['name']."</td>\n";
    echo "<td>".$row['message']."</td>\n</tr>\n";
}
 
echo ("</table>\n");
 

mysqli_close($link);
 

echo ("<a href=\"index.php\">Вернуться</a>");


?>