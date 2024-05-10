<?php
session_start();

//檢查cookie
if (isset($_COOKIE['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
} elseif (isset($_SESSION['id'])) {
    $_COOKIE['id'] = $_SESSION['id'];
}

//取的指定欄位的值
function GetUserData($rowName)
{
    $tablename = "member";
    require("../php/connectDB.php");
    mysqli_query($conn, 'SET NAMES utf8');

    $sql = "SELECT ID,$rowName FROM $tablename WHERE ID = '" . $_SESSION['id'] . "'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row[$rowName];
        }
    }
}