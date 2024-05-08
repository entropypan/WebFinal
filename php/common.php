<?php






function checkHasData($tableName, $rowName, $_where, $_key)
{
    require("../PHP/connectDB.php");
    if (!(isset($_SESSION))) {
        session_start();
    };
    //mysqli_query($conn, 'SET NAMES utf8');


    $sql = "SELECT $rowName FROM $tableName WHERE $_where='" . $_key . "'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}