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
    /*if(!isset($_SESSION['ID'])) {
        echo "<script>alert('請先登入')</script>";
        echo "<script>location.href='../page/loginPage.html'</script>";
    }*/
    $name = $_GET['name'];
    $sql = "SELECT * FROM users WHERE tag='$name'";
    $result = $conn->query($sql);
    $gbc = $result->fetch_assoc();
    if ($gbc['ID'] == $_SESSION['ID']){
        echo "<script>location.href='../page/profile.php'</script>";
    }



    ?>
   
    <!-- 麵包屑 -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../page/index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="Profile">
          User - <?php echo $name ?>
        </li>
      </ol>
    </nav>

    <header>
      
      <?php if($gbc['imgf'] == 0) : ?>
        <img src="../Allphotos/profile1.png" alt="User Avatar" /><br />
      <?php else : ?>
        <img src=<?php echo $gbc['img'] ?> alt="User Avatar" /><br />
      <?php endif; ?>
      

      <!-- 連接資料庫取得使用者資料 -->
      <section id="mainProfile">
        <div id="idfollow" class="user-info">
          <h1><?php echo $gbc['tag'] ?></h1>
          <!-- <button>Follow</button> -->
        </div>
        <h2><?php echo $gbc['name'] ?></h2>
        <!-- Bio -->
        <p><?php echo $gbc['profile'] ?></p>
        <h3>Interests</h3>
        <ul>
          <li>#<?php echo $gbc['tag1'] ?></li>
          <li>#<?php echo $gbc['tag2'] ?></li>
          <li>#<?php echo $gbc['tag3'] ?></li>
        </ul>
      </section>
    </header>

      <!--
      <section class="button">
        <a href="../page/allDiscussion.php" id="uploadedBtn">Upload</a>
        <a href="../page/accountSettings.php" id="favoriteBtn">Settings</a>
      </section>-->

      <section id="uploadedPhotos">
        <div class="photo-container">
          
          <!-- 動態呈現自己上傳的圖片 -->
          <?php
          $uuid = $gbc['ID'];
          $sql2 = "SELECT * FROM pics WHERE author='$uuid' ORDER BY DID ASC";
          $result2 = $conn->query($sql2);
          
          if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
              
              ?>
                <a href="../page/aboutPhoto.php?DID=<?php echo ($row['DID']) ?>">
                    <img src="<?php echo ($row['pic']) ?>" alt="Photo 2" />
                </a>

              <?php
              
            }
          }
          ?>
          
        </div>
      </section>

    </main>
  </body>
</html>
