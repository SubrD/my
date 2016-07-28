<?php

$link = mysqli_connect("localhost", "root", "1", "test_sub");
$dbName = "test_sub"; 

$table = "testB";
$tableX = "test1";
$tableY = "test2";

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_select_db($link, $dbName) or die (mysqli_error($link));

function recreate ($arg, $link_arg)

{

$query_del = "DROP TABLE $arg";

$query_create = "CREATE TABLE $arg (id INT(11) NOT NULL AUTO_INCREMENT, img VARCHAR(255) NOT NULL, message text NOT NULL, date DATE NOT NULL, name VARCHAR(255) NOT NULL, geo text NOT NULL, index (id));";
mysqli_query($link_arg, $query_del);
mysqli_query($link_arg, $query_create);
}

function myerror ($arg, $link_arg) {

echo "There is been a mistake<br>";
mysqli_error($link_arg);
echo "Wait just a sec..<br>";
echo "Trying to recreate tables..<br>";
recreate($arg, $link_arg);
echo "Done.";
mysqli_sqlstate($link_arg);

}


?>