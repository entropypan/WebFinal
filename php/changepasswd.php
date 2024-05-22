<?php

//require_once("../php/common.php");
require("../php/connectDB.php");
require("../php/autoLogin.php");
require("../php/common.php");

if (!(isset($_SESSION))) {
    session_start();
}
$tablename = "users";

$old_post = $_POST["current-password"];
$new_post = $_POST["new-password"];
$check_post = $_POST["confirm-password"];
mysqli_query($conn, 'SET NAMES utf8');
$uID = $_SESSION["ID"];

if ($new_post == $check_post) {
    $passwd_hash = password_hash($new_post, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM $tablename WHERE ID='$uID'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //驗證password hash
            if (password_verify($old_post, @$row["password"])) {
                $sql = "UPDATE $tablename SET password='$passwd_hash' WHERE ID='$uID'";
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
            }
            else {
                echo "<script>alert('舊密碼錯誤')</script>";
                echo "<script>location.href='../page/accountSettings.php'</script>";
            }
        }
    }
} else {
    echo "<script>alert('兩次密碼不同')</script>";
    echo "<script>location.href='../page/accountSettings.php'</script>";
}