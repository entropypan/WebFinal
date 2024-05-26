<?php

require_once("../php/connectDB.php");
require_once("../php/common.php");

$tablename = "users";
mysqli_query($conn, 'SET NAMES utf8');

$mail_post = $_POST['email'];

if (checkHasData($tablename, "mail", "mail", $mail_post)) {
    setcookie('email', $mail_post);
    echo "<script>location.href='../page/resetPage.html'</script>";
} else {
    echo "<script>alert('沒有此帳號')</script>";
    echo "<script>location.href='../page/forgotPassword.html'</script>";
}