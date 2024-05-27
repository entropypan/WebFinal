<!DOCTYPE html>
<html lang="en">
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
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo ($tpc) ?></title>
    <link rel="stylesheet" href="../css/discussionStyle.css" />
  </head>
  <body>
    
    <!-- 麵包屑 -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../page/index.php">Home</a></li>
        <li class="breadcrumb-item">
          <a href="../page/allDiscussion.php">Discussion</a>
        </li>
        <li class="breadcrumb-item active" aria-current="The cat within my gaze...">
          <?php echo ($tpc) ?>
        </li>
      </ol>
    </nav>

    <div class="title-container">
      <!-- 標題 -->
      <h1><?php echo ($tpc) ?></h1>

      <a id="uploadButton" href="../page/CreatePage.php?topic=<?php echo ($tpc) ?>">Upload my Response</a>
    </div>

    <!-- 動態呈現各回覆 -->
    <div class="uploaded-images">
    <?php 
    $sql = "SELECT * FROM pics WHERE topic='$tpc' ORDER BY DID ASC";
    $result = $conn->query($sql);
    if (($result != false) && ($result->num_rows > 0)) {
      while($row = $result->fetch_assoc()) {
        ?>

          <img
            src="<?php echo ($row['pic']) ?>"
            alt="pic"
          />

        <?php
        }
      }
    ?>
    </div>
  </body>
</html>
