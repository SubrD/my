<?php

// Выводим данные
function myoutput ($arg1, $arg2, $arg3)
{

echo ("
<!DOCTYPE html>
 
<head>
 
    <title>Вывод данных из MySQL</title>
 

 
</head>
 
<body>
<div class=$arg3>
<h3 align=center>$arg2</h3>
 
<table border=\"1\">
  <td align=\"center\"><b>#</b></td>
  <td align=\"center\"><b>img</b></td>
  <td align=\"center\"><b>Дата</b></td>
  <td align=\"center\"><b>Имя</b></td>
  <td align=\"center\"><b>Сообщение</b></td>
 </tr>
");
 
while ($row = mysqli_fetch_array($arg1)) {
    echo "<tr>\n";
    echo "<td>".$row['id']."</td>\n";
    printf ("<td><img src='/my/img/%s' width=200px\></td>\n",$row['img']);
    echo "<td>".$row['date']."</td>\n";
    echo "<td>".$row['name']."</td>\n";
    echo "<td>".$row['message']."</td>\n</tr>\n";
}
 


echo ("</table></div>\n");

}

?>