<?php

require_once("../php/connectDB.php");
require_once("../php/common.php");

$tablename = "users";
mysqli_query($conn, 'SET NAMES utf8');

$passwd_post = $_POST['password'];
$check_post = $_POST['newPassword'];
$mail_post = $_COOKIE['email'];
setcookie("email", "", time());

if ($passwd_post == $check_post) {
    $passwd_hash = password_hash($passwd_post, PASSWORD_DEFAULT);
    $sql = "UPDATE $tablename SET password='$passwd_hash' WHERE mail='$mail_post'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result) {
        // 成功
        echo "<script>alert('Successed')</script>";
        echo "<script>location.href='../page/loginPage.html'</script>";
    } else {
        // 失敗
        echo "<script>alert('Failed')</script>";
        echo "<script>location.href='../page/forgotPassword.html'</script>";
    }
} else {
    echo "<script>alert('兩次密碼不同')</script>";
    echo "<script>location.href='../page/resetPage.html'</script>";
}