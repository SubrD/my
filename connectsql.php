<?php

$link = mysqli_connect("localhost", "root", "1", "test_sub");
$dbName = "test_sub"; 

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_select_db($link, $dbName) or die (mysqli_error($link));

?>