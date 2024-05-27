<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Discussions</title>
    <link rel="stylesheet" href="../css/allDiscussionStyle.css" />
  </head>
  <body>
    <?php
      require("../php/autoLogin.php");
      require("../php/connectDB.php");
      require("../php/common.php");
    ?>
    <!-- 麵包屑 -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../page/index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="All Discussions">
          Discussions
        </li>
      </ol>
    </nav>

    <div class="title-container">
      <h1>All Discussions</h1>
      <!-- Upload my Response 按鈕 -->
      <a id="uploadButton" href="../page/initiateDis.php">Initiate A Discussion</a>
    </div>

    <!-- 動態呈現討論區 -->
    <?php
      $sql = "SELECT * FROM posts ORDER BY PID ASC";
      $result = $conn->query($sql);
      // echo "<script>alert('$result->num_rows')</script>";
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          ?>
          <div class="discussion-block">
            <h2><?php echo ($row['topic']) ?></h2>
            <div class="photos">
              <?php
              $tpc = $row['topic']; 
              $sql2 = "SELECT * FROM pics WHERE topic='$tpc' ORDER BY DID ASC";
              $result2 = $conn->query($sql2);
              $cnt = 0;
              while(($row2 = $result2->fetch_assoc()) && $cnt < 4) {
                ?>
                <img src="<?php echo ($row2['pic']) ?>" />
                <?php
                $cnt = $cnt+1;
              }
              ?>
            </div>
            <a href="discussion.php?topic=<?php echo ($row['topic']) ?>" class="more-link">...more</a>
          </div>
          <?php
        }
      }
    ?>

  </body>
</html>
