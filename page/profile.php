<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link href="../css/profileStyle.css" rel="stylesheet" />
  </head>
  <body>

    <?php require("../php/autoLogin.php"); 
    if(!isset($_SESSION["id"])) {
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
      
      <img src="../Allphotos/forky.jpg" alt="User Avatar" />

      <section id="mainProfile">
        <div id="idfollow" class="user-info">
          
          <h1>@forky.0731</h1>
          
          <button>Follow</button>
        </div>

        
        <h2>Forky</h2>
        <!-- Bio -->
        <p>
          I am not a toy, I was made for soups, salads, maybe chili, and then
          the trash.
        </p>
        
        <h3>Interests</h3>
        <ul>
          <li>#Landscape</li>
          <li>#Life</li>
          <li>#Cat</li>
          
        </ul>
        
      </section>
    </header>

      <!--change-->
      <section class="button">
        <button id="uploadedBtn">Uploaded Photos</button>
        <button id="favoriteBtn">Saved Photos</button>
      </section>

      
      <section id="uploadedPhotos">
        <div class="photo-container">
          <img src="../Allphotos/woody.jpg" alt="Photo 1" />
          <img src="../Allphotos/buzz.jpg" alt="Photo 2" />
          <img src="../Allphotos/slinky.jpg" alt="Photo 3" />
          <img src="../Allphotos/toy3.jpg" alt="Photo 4" />
          
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
