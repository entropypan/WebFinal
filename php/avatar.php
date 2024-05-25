<?php

//require_once("../php/common.php");
require("../php/connectDB.php");
if (!(isset($_SESSION))) {
    session_start();
}
$tablename = "users";
mysqli_query($conn, 'SET NAMES utf8');
$imagestring = trim($_REQUEST["imagestring"]);
$uID = $_SESSION["ID"];
$sql = "UPDATE $tablename SET 
        img='$imagestring',
        imgf=1
        WHERE ID='$uID'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if ($result) {
    // 成功
    echo "<script>alert('Successed')</script>";
    echo "<script>location.href='../page/accountSettings.php'</script>";
} else {
    // 失敗
    echo "<script>location.href='../page/accountSettings.php'</script>";
    echo ("Faild");
}