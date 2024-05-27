<?php
require_once("../php/connectDB.php");
require_once("../php/common.php");
$tableName = "users";

$pass = 0;
$name_post = $_POST["name_input"];
$mail_post = $_POST["mail_input"];

mysqli_query($conn, 'SET NAMES utf8');

// 檢查email格式
if (!filter_var($mail_post, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email format')</script>";
    echo "<script>location.href='../page/signUpPage.html'</script>";
    // die("Invalid email format");
    $pass = 1;
};

$passwd_post = mysqli_real_escape_string($conn, $_POST["password_input"]);
$confirm_post = mysqli_real_escape_string($conn, $_POST["confirm_input"]);

// 檢查資料庫有無重複email
if (checkHasData($tableName, "mail", "mail", $mail_post)) {
    echo "<script>alert('Email already exists')</script>";
    echo "<script>location.href='../page/signUpPage.html'</script>";
    $pass = 1;
}

// 兩次密碼不同
if ($passwd_post != $confirm_post) {
    echo "<script>alert('Please check your password again')</script>";
    echo "<script>location.href='../page/signUpPage.html'</script>";
    $pass = 1;
}

// 都沒問題就註冊
if ($pass == 0){
    /*if ($result->num_rows == 0) {*/
        $uId = uniqid("u");
        $tag = uniqid("t");
        $passwd_hash = password_hash($passwd_post, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $tableName(ID,name,mail,password,tag) 
                VALUES('$uId','$name_post','$mail_post','$passwd_hash','$tag')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($result) {
            // 成功
            echo "<script>alert('Enroll Successed')</script>";
            echo "<script>location.href='../page/loginPage.html'</script>";
        } else {
            // 失敗
            echo "<script>alert('Enroll Failed')</script>";
            echo "<script>location.href='../index.php'</script>";
        }
    /*}*/
}

$conn->close();