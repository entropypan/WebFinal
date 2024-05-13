<?php
session_start();

//檢查cookie
if (isset($_COOKIE['ID'])) {
    $_SESSION['ID'] = $_COOKIE['ID'];
} elseif (isset($_SESSION['ID'])) {
    $_COOKIE['ID'] = $_SESSION['ID'];
}

// GUP func
function GetUserData($rowName)
{
    $tablename = "users";
    require("../php/connectDB.php");
    mysqli_query($conn, 'SET NAMES utf8');

    $sql = "SELECT ID,$rowName FROM $tablename WHERE ID = '" . $_SESSION['ID'] . "'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row[$rowName];
        }
    }
}