<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "be21_cr4_manuelhirschbeck_biglibrary";

$connection = mysqli_connect($hostName, $userName, $password, $databaseName);

if(!$connection) {
    die("Connection failed");
}
?>
