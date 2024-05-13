<?php
$serverName = "localhost";
$username = "root";
$password = "148963";

// temp
$dbname = "yesy";
$conn = mysqli_connect($serverName, $username, $password, $dbname) or die(mysqli_connect_error($conn));

// fail
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, 'SET NAMES utf8');
?>