<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:

?>

<link rel="stylesheet" type="text/css" href="style.css">
<body class = "coolpages">
<?php
	
	include 'include/connectsql.php';
    include 'include/upload.php';


	if (md5($_POST['norobot']) == $_SESSION['rand'])	{ 

	$_SESSION['rand'] = 0;

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

header("location:submitions.php");



mysqli_close($link);
 

	
	}	else {  
		
			echo "Try once more";
	}

?>

</body>

<?php endif; ?>