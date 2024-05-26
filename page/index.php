<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Picruise</title>

    <!--接到CSS檔案-->
    <link rel="stylesheet" href="../css/index.css" />
  </head>

  <body>

    <!--檢查登入-->
    <?php
    require("../php/autoLogin.php");
    ?>

    <header>
      <h1>Picruise</h1>
      <!-- 新增登入和註冊按鈕結束 --> 
    </header>    
    <!-- 左邊設定欄位 -->
    <aside>
      <ul>
        <li>
          <img src="../Allphotos/home1.png" alt="home" />
          <a href="../page/index.php" class="button set-button">
            Home
          </a>
        </li>
        
        <li>
          <img src="../Allphotos/Initiate.png" alt="create" />
          <a href="../page/alldiscussion.php" class="button set-button">
            Initiate
          </a>
        </li>
        <li>
          <img src="../Allphotos/Profile1.png" alt="profile" />
          <a href="../page/profile.php" class="button set-button">
            Profile
          </a>
        </li>
        <li>
          <img src="../Allphotos/Accounts.png" alt="notification" />
          <a href="../page/accountSettings.php" class="button set-button">
            Setting
          </a>
        </li>

        <?php if (@$_SESSION['ID']) { ?>
          
        <li>
          <img src="../Allphotos/login.png" alt="Forum" />
          <a href="../php/logout.php" class="button set-button">                     
            Log out
          </a>
        </li>

        <?php } else { ?>

        <li>
          <img src="../Allphotos/login.png" alt="Forum" />
          <a href="../page/loginpage.html" class="button set-button">                     
            Log in
          </a>
        </li>
        <li>
          <img src="../Allphotos/SignUp.png" alt="Forum" />
          <a href="../page/signUpPage.html" class="button set-button"> 
            Sign Up
          </a>
        </li>

        <?php } ?>

        <!-- 添加更多主題 -->
      </ul>
    </aside>
    <!-- 左邊設定欄位結束 -->
    <!-- 主題區 -->
    <!-- 1 -->
    <div class="container">
      <!---->
      <div class="card">
        <img src="../Allphotos/cat.png" class="card-img-top" alt="photo.jpg" />
        <div class="card-body">
          <h5 class="card-title">The Cat Within My Gaze...</h5>
          <a href="../page/discussion.php" class="joinbutton">Join</a>
        </div>
      </div>
      <div class="card">
        <img src="../Allphotos/buzz.jpg" class="card-img-top" alt="photo.jpg" />
        <div class="card-body">
          <h5 class="card-title">Buzz</h5>
          <a href="../page/discussion.php" class="joinbutton">Join</a>
        </div>
      </div>
      <div class="card">
        <img src="../Allphotos/forgot.jpg" class="card-img-top" alt="photo.jpg" />
        <div class="card-body">
          <h5 class="card-title">Lazy Cat</h5>
          <a href="../page/discussion.php" class="joinbutton">Join</a>
        </div>
      </div>
      <div class="card">
        <img src="../Allphotos/forky.jpg" class="card-img-top" alt="photo.jpg" />
        <div class="card-body">
          <h5 class="card-title">Forky</h5>
          <a href="../page/discussion.php" class="joinbutton">Join</a>
        </div>
      </div>
      <div class="card">
        <img src="../Allphotos/VFD.jpg" class="card-img-top" alt="photo.jpg" />
        <div class="card-body">
          <h5 class="card-title">VFD</h5>
          <a href="../page/discussion.php" class="joinbutton">Join</a>
        </div>
      </div>
      <div class="card">
        <img src="../Allphotos/slinky.jpg" class="card-img-top" alt="photo.jpg" />
        <div class="card-body">
          <h5 class="card-title">Slinky</h5>
          <a href="../page/discussion.php" class="joinbutton">Join</a>
        </div>
      </div>
      <div class="card">
        <img src="../Allphotos/monster1.jpg" class="card-img-top" alt="photo.jpg" />
        <div class="card-body">
          <h5 class="card-title">Monsters</h5>
          <a href="../page/discussion.php" class="joinbutton">Join</a>
        </div>
      </div>
      <!---->
      <?php




      ?>

    </div>
  </body>
</html>
