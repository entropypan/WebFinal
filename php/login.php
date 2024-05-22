<?php

require_once("../php/connectDB.php");
$tablename = "users";
mysqli_query($conn, 'SET NAMES utf8');

$mail_post = mysqli_real_escape_string($conn, $_POST["mail_input"]);
$passwd_post = mysqli_real_escape_string($conn, $_POST["password_input"]);

$sql = "SELECT * FROM $tablename WHERE mail='$mail_post'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //驗證password hash
        if (password_verify($passwd_post, @$row["password"])) {
            session_start();
            $_SESSION['ID'] = @$row['ID'];
            setcookie('ID', @$row['ID'], time() + 60 * 60 * 7);
            //echo "<script>alert('GO')</script>";
            echo "<script> location.href='../index.php'  </script>";
        }
        else {
            echo "<script>alert('密碼錯誤')</script>";
            echo "<script>location.href='../page/login.php'</script>";
        }
    }
}