<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link href="../css/profileStyle.css" rel="stylesheet" />
  </head>
  <body>

    <?php 
    require("../php/autoLogin.php");
    require("../php/connectDB.php");
    require("../php/common.php"); 
    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('請先登入')</script>";
        echo "<script>location.href='../page/loginPage.html'</script>";
    }
    ?>
   
    <!-- 麵包屑 -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../page/index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="Profile">
          Profile
        </li>
      </ol>
    </nav>

    <header>
      
      <?php if(GetData('imgf') == 0) : ?>
        <img src="../Allphotos/forgot.jpg" alt="User Avatar" /><br />
      <?php else : ?>
        <img src=<?php GetUserData('img') ?> alt="User Avatar" /><br />
      <?php endif; ?>

      <section id="mainProfile">
        <div id="idfollow" class="user-info">
          
          <h1><?php GetUserData('tag') ?></h1>
          
          <!-- <button>Follow</button> -->
        </div>

        
        <h2><?php GetUserData('name') ?></h2>
        <!-- Bio -->
        <p><?php GetUserData('profile') ?></p>
        
        <h3>Interests</h3>
        <ul>
          <li>#<?php GetUserData('tag1') ?></li>
          <li>#<?php GetUserData('tag2') ?></li>
          <li>#<?php GetUserData('tag3') ?></li>
          
        </ul>
        
      </section>
    </header>

      
      <section class="button">
        <button id="uploadedBtn">Uploaded Photos</button>
        <button id="favoriteBtn">Settings</button>
      </section>

      
      <section id="uploadedPhotos">
        <div class="photo-container">
          <!--<img src="../Allphotos/woody.jpg" alt="Photo 1" />
          <img src="../Allphotos/buzz.jpg" alt="Photo 2" />
          <img src="../Allphotos/slinky.jpg" alt="Photo 3" />
          <img src="../Allphotos/toy3.jpg" alt="Photo 4" />-->
          <?php
          $sql = "SELECT * FROM pics ORDER BY DID ASC";
          $result = $conn->query($sql);
          // echo "<script>alert('$result->num_rows')</script>";
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              if ($row['author'] == $_SESSION['ID']) {
              ?>
                <img src="<?php echo ($row['pic']) ?>" alt="Photo 2" />
              <?php
              }
            }
          }


          ?>
          
        </div>
      </section>

      
      <section id="savedPhotos">
        <div class="photo-container">
          <img src="../Allphotos/monster.jpeg" alt="saved Photo 1" />
          <img src="../Allphotos/monster1.jpg" alt="saved Photo 2" />
          
        </div>
      </section>
    </main>

    <script>
      // JavaScript代码
      document.addEventListener("DOMContentLoaded", function () {
        const uploadedSection = document.getElementById("uploadedPhotos");
        const savedSection = document.getElementById("savedPhotos");
        const uploadedBtn = document.getElementById("uploadedBtn");
        const savedBtn = document.getElementById("favoriteBtn");

        // 隐藏收藏照片部分
        savedSection.style.display = "none";

        // 上傳照片按鈕點擊事件
        uploadedBtn.addEventListener("click", function () {
          uploadedSection.style.display = "block";
          savedSection.style.display = "none";
        });

        // 收藏照片按鈕點擊事件
        savedBtn.addEventListener("click", function () {
          uploadedSection.style.display = "none";
          savedSection.style.display = "block";
        });
      });
    </script>
  </body>
</html>
