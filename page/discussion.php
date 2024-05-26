<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Cat Within My Gaze...</title>
    <link rel="stylesheet" href="../css/discussionStyle.css" />
  </head>
  <body>
    <?php 
    require("../php/autoLogin.php");
    require("../php/connectDB.php");
    require("../php/common.php"); 
    /*if(!isset($_SESSION['ID'])){
        echo "<script>alert('請先登入')</script>";
        echo "<script>location.href='../page/loginPage.html'</script>";
    }*/
    $tpc = $_GET["topic"];
    ?>
    <!-- 麵包屑 -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../page/index.php">Home</a></li>
        <li class="breadcrumb-item">
          <a href="../page/allDiscussion.php">Discussion</a>
        </li>
        <li class="breadcrumb-item active" aria-current="The cat within my gaze...">
          The cat within my gaze...
        </li>
      </ol>
    </nav>

    <div class="title-container">
      <!-- 標題 -->
      <h1>The Cat Within My Gaze...</h1>

      <a id="uploadButton" href="../page/CreatePage.php?topic=<?php echo ($tpc) ?>">Upload my Response</a>
    </div>

    <!-- 上傳上來的照片 
    <div class="uploaded-images">
      <img
        src="../Allphotos/VFD.jpg"
        alt="Photo1"
      />
      <img
        src="../Allphotos/cat.png"
        alt="Photo2"
      />
      <img
        src="../Allphotos/buzz.jpg"
        alt="Photo3"
      />
      <img
        src="../Allphotos/reset.jpg"
        alt="Photo4"
      />
      <img
        src="../Allphotos/VFD.jpg"
        alt="Cat 5"
      />
    </div>-->
    <div class="uploaded-images">
    <?php 
    $sql = "SELECT * FROM pics WHERE topic='$tpc' ORDER BY DID ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        ?>
        <img
          src="<?php echo ($row['pic']) ?>"
          alt="Cat 5"
        />
        <?php
        }
      }
    ?>
    </div>
  </body>
</html>
