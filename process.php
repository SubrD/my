<link rel="stylesheet" type="text/css" href="style.css">

<?php
	session_start();
	include 'connectsql.php';
    include 'upload.php';
    include 'table_output.php';


	if (md5($_POST['norobot']) == $_SESSION['rand'])	{ 
	

$finalfile = upload2 ($_FILES);



$cdate = date("Y-m-d");
$name1 = $_POST['name'];
$msg = $_POST["msg1"];
$mygeo = $_POST["geo"];


$res = mysqli_query($link, "SELECT COUNT(*) FROM $table") or myerror($table, $link);
$row = mysqli_fetch_row($res);
$total = $row[0];

$total % 2 == 0 ? $table_write = "test1" : $table_write = "test2";


if ($msg != "" and $name1 != "")
$query = "INSERT INTO $table SET name='".$name1."', message='".$msg."', img='".$finalfile."',geo='".$mygeo."',date='$cdate'";
else die(header ('Location: index.php'));
$query2 = "INSERT INTO $table_write SET name='".$name1."', message='".$msg."', img='".$finalfile."', geo='".$mygeo."', date='$cdate'";


//$query2 = "INSERT INTO $tableX (id, name, message, date) SELECT id, name, message, date FROM $table WHERE MOD(id,2) = 0";
//$query3 = "INSERT INTO $tableY (id, name, message, date) SELECT id, name, message, date FROM $table WHERE MOD(id,2) = 1";


//выполняем запрос
mysqli_query($link, $query) or myerror($table, $link);
mysqli_query($link, $query2) or myerror($table_write, $link);




//разъединяемся

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

	
	}	else {  
		
			echo "Try once more";
	}

?>