<link rel="stylesheet" type="text/css" href="style.css">


<?php
	session_start();
	include 'connectsql.php';

	if (md5($_POST['norobot']) == $_SESSION['rand'])	{ 
	
//часть uploading
#
#
#
#
##################


$filename = $_FILES['filename']['tmp_name'];
$size = $_FILES["filename"]["size"];
$max_image_width  = 1800;
$max_image_height = 1800;
$max_image_size   = 1024*1*1024;

   if($size > $max_image_size)
   {
     echo ("Error: File size > 1mb");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($filename))
   {
      $pxsize = GetImageSize($filename);
      if (($pxsize) && ($pxsize[0] < $max_image_width) && ($pxsize[1] < $max_image_height))
      {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную, где?

     if (@move_uploaded_file($filename, "../my/img/".$_FILES["filename"]["name"])) {
          $finalfile = $_FILES["filename"]["name"];
          
        } 
     else 
           {
           			echo 'Error: moving fie failed.';
          			exit();
           }
     }
     else {echo 'Максимальный размер картинки 380x600'; exit();}


   } else {
      echo("Uploading error");
      exit();
   }

###############################



//определяем таблицу
$table = "testB";
$tableX = "test1";
$tableY = "test2";



$cdate = date("Y-m-d");

$name1 = $_POST['name'];
$msg = $_POST["msg1"];



if ($msg != "" and $name1 != "")
$query = "INSERT INTO $table SET name='".$name1."', message='".$msg."', img='".$finalfile."',date='$cdate'";
else die(header ('Location: index.php'));

$res = mysqli_query($link, "SELECT COUNT(*) FROM $table");
$row = mysqli_fetch_row($res);
$total = $row[0];

$total % 2 == 0 ? $table_write = "test1" : $table_write = "test2";

$query2 = "INSERT INTO $table_write SET name='".$name1."', message='".$msg."', img='".$finalfile."', date='$cdate'";


//$query2 = "INSERT INTO $tableX (id, name, message, date) SELECT id, name, message, date FROM $table WHERE MOD(id,2) = 0";
//$query3 = "INSERT INTO $tableY (id, name, message, date) SELECT id, name, message, date FROM $table WHERE MOD(id,2) = 1";


//выполняем запрос
mysqli_query($link, $query) or die(mysqli_error($link));
mysqli_query($link, $query2) or die(mysqli_error($link));


//разъединяемся

$query = "SELECT id, img, name, message, date FROM $table WHERE name != '' AND message != '' ";
//$query2 = "SELECT id, name, message, date FROM $table WHERE name != '' AND message != '' AND MOD(id,2) = 0";
//$query3 = "SELECT id, name, message, date FROM $table WHERE name != '' AND message != '' AND MOD(id,2) = 1";
$query2 = "SELECT id, img, name, message, date FROM $tableX WHERE name != '' AND message != '' ";
$query3 = "SELECT id, img, name, message, date FROM $tableY WHERE name != '' AND message != '' ";


$res = mysqli_query($link, $query) or die(mysqli_error($link));
$res2 = mysqli_query($link, $query2) or die(mysqli_error($link));
$res3 = mysqli_query($link, $query3) or die(mysqli_error($link));

// Выводим данные
function myoutput ($arg1, $arg2)
{

echo ("
<!DOCTYPE html>
 
<head>
 
    <title>Вывод данных из MySQL</title>
 

 
</head>
 
<body>
 
<h3>$arg2</h3>
 
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
    echo "<td><img src='/my/img/".$row['img']."'\></td>\n";
    echo "<td>".$row['date']."</td>\n";
    echo "<td>".$row['name']."</td>\n";
    echo "<td>".$row['message']."</td>\n</tr>\n";
}
 


echo ("</table>\n");

}

myoutput($res, "Main Table");
myoutput($res2, "Таблица 1");
myoutput($res3, "Таблица 2");

mysqli_close($link);
 

echo ("<a href=\"index.php\">Вернуться</a>");

	
	
	}	else {  
		
			echo "Try once more";
	}

?>