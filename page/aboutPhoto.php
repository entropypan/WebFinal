<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/aboutStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/discussionStyle.css" />
    <title>About Photos</title>
  </head>
  <body>
    <?php
    require("../php/autoLogin.php");
    require("../php/connectDB.php");
    require("../php/common.php");
    $did_get = $_GET["DID"];
    $sql = "SELECT * FROM pics WHERE DID='$did_get'";
    $result = $conn->query($sql);
    $mygo = $result->fetch_assoc();
    $tpc = $mygo['topic'];
    $atr_name = $mygo['author'];
    $sql = "SELECT * FROM users WHERE ID='$atr_name'";
    $result = $conn->query($sql);
    $ave = $result->fetch_assoc();
    ?>
    <!-- 麵包屑 -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../page/index.php">Home</a></li>
        <li class="breadcrumb-item">
          <a href="../page/allDiscussion.php">Discussion</a>
        </li>
        <li class="breadcrumb-item active" aria-current="The cat within my gaze...">
        <a href="../page/discussion.php?topic=<?php echo ($tpc) ?>"><?php echo ($tpc) ?></a>
        </li>
      </ol>
    </nav>
    <div class="post">
      <div class="post-photo">
        <img src="<?php echo ($mygo['pic']) ?>" alt="Post Photo" />
      </div>
      <div class="post-details">
        <div class="user-info">
          <a href="../page/user.php?name=<?php echo ($ave['tag']) ?>">
          <?php if($ave['imgf'] == 0) : ?>
            <img src="../Allphotos/profile1.png" alt="User Avatar" />
          <?php else : ?>
            <img src="<?php echo ($ave['img']) ?>" alt="User Avatar" />
          <?php endif; ?> 
          </a>
          <h3><a href="../page/user.php?name=<?php echo ($ave['tag']) ?>"><?php echo ($ave['tag']) ?></a></h3>
        </div>
        <div class="post-content">
          <h2><?php echo ($mygo['topic']) ?></h2>
          <p>Camera: <?php echo ($mygo['equip']) ?></p>
          <p>Location: <?php echo ($mygo['loc']) ?></p>
          <p>Time: <?php echo ($mygo['time']) ?></p>
        </div>
        <div class="post-actions">
          <!--
          <button class="like-button">
            <img src="../Allphotos/like.png" alt="Like" class="default-image" />
            <img src="../Allphotos/liked.png" alt="Liked" class="clicked-image" />
          </button>
          <button class="saved-button">
            <img src="../Allphotos/save.png" alt="Save" class="default-image" />
            <img src="../Allphotos/saved.png" alt="Saved" class="clicked-image" />
          </button>
          <button class="follow-button">
            <img
              src="../Allphotos/follow.png"
              alt="Follow"
              class="default-image"
            />
            <img
              src="../Allphotos/following.png"
              alt="Following"
              class="clicked-image"
            />
          </button>
          -->
          <button class="like-button">
            <img src="../Allphotos/del.png" alt="Like" class="default-image" />
          </button>
        </div>
      </div>
    </div>
  </body>
  <script>
    /*
    document.addEventListener("DOMContentLoaded", function () {
      const likeButton = document.querySelector(".like-button");
      const savedButton = document.querySelector(".saved-button");
      const followButton = document.querySelector(".follow-button");

      let isLikeClicked = false;
      let isSavedClicked = false;
      let isFollowClicked = false;

      function toggleButton(button, isClicked) {
        const defaultImage = button.querySelector(".default-image");
        const clickedImage = button.querySelector(".clicked-image");

        if (isClicked) {
          defaultImage.style.display = "none";
          clickedImage.style.display = "block";
        } else {
          defaultImage.style.display = "block";
          clickedImage.style.display = "none";
        }
      }

      likeButton.addEventListener("click", function () {
        isLikeClicked = !isLikeClicked;
        toggleButton(this, isLikeClicked);
      });

      savedButton.addEventListener("click", function () {
        isSavedClicked = !isSavedClicked;
        toggleButton(this, isSavedClicked);
      });

      followButton.addEventListener("click", function () {
        isFollowClicked = !isFollowClicked;
        toggleButton(this, isFollowClicked);
      });
    }); */
  </script>
</html>
