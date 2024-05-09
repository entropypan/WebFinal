<?php
//註冊

require_once("../PHP/connectDB.php");
require_once("../PHP/common.php");
$tableName = "users";

$pass = 0;
$name_post = $_POST["name_input"];
$mail_post = $_POST["mail_input"];

//檢查和消毒輸入格式
//$mail_post = mysqli_real_escape_string($conn, $_POST["mail_input"]);
//$mail_post = $_POST["mail_input"];
if (!filter_var($mail_post, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email format')</script>";
    echo "<script>location.href='../signUpPage.html'</script>";
    // die("Invalid email format");
    $pass = 1;
};


$passwd_post = mysqli_real_escape_string($conn, $_POST["password_input"]);
$confirm_post = mysqli_real_escape_string($conn, $_POST["confirm_input"]);


mysqli_query($conn, 'SET NAMES utf8');

//檢查重複email
if (checkHasData($tableName, "mail", "mail", $mail_post)) {
    echo "<script>alert('Email already exists')</script>";
    echo "<script>location.href='../signUpPage.html'</script>";
    // die("Email already exists");
    $pass = 1;
}
//if($result->num_rows>0){die("<script>資料重複</script>");}

//兩次密碼不同
if ($passwd_post != $confirm_post) {
    echo "<script>alert('Please check your password again')</script>";
    echo "<script>location.href='../signUpPage.html'</script>";
    // die("Please check your password again");
    $pass = 1;
}

//不重複=>創建:
if ($pass == 0){
    if ($result->num_rows == 0) {
    $uId = uniqid("u");
    $passwd_hash = password_hash($passwd_post, PASSWORD_DEFAULT);

    $sql = "INSERT INTO $tableName(ID,name,mail,password)
        VALUES('" . $uId . "','" . $name_post . "','" . $mail_post . "','" . $passwd_hash . "')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        //成功:
        echo "<script>alert('Enroll Successed')</script>";
        echo "<script>location.href='../index.php'</script>";
    } else {
        //失敗:
        echo "<script>location.href='../index.php'</script>";
        echo ("Enroll Faild");
    }
}

}

$conn->close();