<?php

require("../php/connectDB.php");
require("../php/common.php");
require("../php/autoLogin.php");

if (!(isset($_SESSION))) {
    session_start();
}

mysqli_query($conn, 'SET NAMES utf8');
$pass = 0;

$topic = $_POST["topic"];
$equip_post = $_POST["equipment"];
$time_post = $_POST["time"];
$loc_post = $_POST["location"];
$pic = trim($_REQUEST["imagestring"]);
$atr = GetData("tag");
$tpc = $_POST['topic'];

if($pass == 0){
    $sql = "INSERT INTO pics(topic,author,equip,time,loc,pic) 
            VALUES ('$tpc','$atr','$equip_post','$time_post','$loc_post','$pic')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        // 成功
        echo "<script>alert('OK!')</script>";
        echo "<script>location.href='../index.php'</script>";
    } else {
        // 失敗
        echo "<script>location.href='../page/initiateDis.php'</script>";
        echo ("Initiate Faild");
    }

}