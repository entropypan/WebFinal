<?php

//require_once("../php/common.php");
require("../php/connectDB.php");
require("../php/common.php");
require("../php/autoLogin.php");

if (!(isset($_SESSION))) {
    session_start();
}
$tablename = "users";
$pass = 0;
$tag_post = $_POST["username"];
$name_post = $_POST["realname"];
$tag1_post = $_POST["tag1"];
$tag2_post = $_POST["tag2"];
$tag3_post = $_POST["tag3"];
$bio_post = $_POST["bio"];
//$mail_post = $_POST["email"];
mysqli_query($conn, 'SET NAMES utf8');


// 檢查資料庫有無重複username
if (checkHasData($tablename, "tag", "tag", $tag_post)) {
    if(GetData('name') != $name_post) {
        echo "<script>alert('Username already exists')</script>";
        echo "<script>location.href='../page/accountSettings.php'</script>";
        $pass = 1;
    }
}

if($pass == 0){
    $uID = $_SESSION["ID"];
    $sql = "UPDATE $tablename SET 
            tag='$tag_post',
            name='$name_post',
            tag1='$tag1_post',
            tag2='$tag2_post',
            tag3='$tag3_post',
            profile='$bio_post'
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
}