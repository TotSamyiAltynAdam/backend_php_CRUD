<?php

$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "backend232final";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "Error: could not connect to db. Please Try again later";
    exit();
}

?>