<?php
require("../php/connectDB.php");
require("../php/common.php");
require("../php/autoLogin.php");
if (!(isset($_SESSION))) {
    session_start();
}
mysqli_query($conn, 'SET NAMES utf8');
$pass = 0;
$delid = $_POST['delid'];

$sql = "SELECT * FROM pics WHERE CID='$delid'";
$result = $conn->query($sql);
if (($result != false) || ($result->num_rows > 0)) {
    $delp = $result->fetch_assoc();
    $atr_id = $delp['author'];
    if ($_SESSION['ID'] == $atr_id) {
        $pass = 1;
    } else {
        $deluid = $_SESSION['ID'];
        $sql = "SELECT * FROM admin WHERE AID='$deluid'";
        $result = $conn->query($sql);
        if (($result != false) && ($result->num_rows > 0)) {
            $pass = 1;
        } else {
            $pass = 0;
        }
    }
} else {
    $pass = 0;
}

if($pass != 1){
    echo "<script>alert('ERROR!')</script>";
    echo "<script>location.href='../index.php'</script>";
} else {
    $tpc = $delp['topic'];
    $sql = "DELETE FROM pics WHERE CID='$delid'";
    $result = $conn->query($sql);
    
    if (!$result) {
        echo "<script>alert('ERROR!')</script>";
        echo "<script>location.href='../index.php'</script>";
    } else {
        $sql = "SELECT * FROM pics WHERE topic='$tpc' ORDER BY DID ASC";
        $result = $conn->query($sql);
        $ccc = $result->fetch_assoc();
        $newcid = $ccc['CID'];
        $sql = "UPDATE posts SET CID='$newcid' WHERE topic='$tpc'";
        $result = $conn->query($sql);
        if (!$result) {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>location.href='../index.php'</script>";
        } else {
            echo "<script>alert('OK!')</script>";
            echo "<script>location.href='../index.php'</script>";
        }
    }
}