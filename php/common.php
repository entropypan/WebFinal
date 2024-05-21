<?php

/*$func_name = @$_POST['func_name'];
$tb_name_post = @$_POST['tb_name_post'];
$row_name_post = @$_POST['row_name_post'];
$where_post = @$_POST['where_post'];
$key_post = @$_POST['key_post'];

if ($func_name == "updateData") {
    $val_post = @$_POST['val_post'];
    updateData($tb_name_post, $row_name_post, $val_post, $where_post, $key_post);
}

*/

function checkHasData($tableName, $rowName, $_where, $_key)
{
    require("../php/connectDB.php");
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