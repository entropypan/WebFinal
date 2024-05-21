<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account Settings</title>
    <link rel="stylesheet" href="../css/accountSettingsStyle.css" />
  </head>
  <body>

    <?php require("../php/autoLogin.php"); 
    if(!isset($_SESSION['ID'])){
        echo "<script>alert('請先登入')</script>";
        echo "<script>location.href='../page/loginPage.html'</script>";
    }
    ?>

    <!-- 麵包屑 -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../page/index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="Settings">
          Account Settings
        </li>
      </ol>
    </nav>

    <div id="container">
      <div id="content-wrapper">
        <div id="sidebar">
          <ul>
            <li>
              <a href="#" onclick="showSetting('basic-info')">General</a>
            </li>
            <li>
              <a href="#" onclick="showSetting('change-password')">Change Password</a>
            </li>
            <!--<li>
              <a href="#" onclick="showSetting('profile-info')">Profile Info</a>
            </li>-->
            <li>
              <a href="#" onclick="showSetting('notification')">Notifications</a>
            </li>
          </ul>
        </div>
        <div id="main-content">
          <div id="basic-info" class="setting-page" style="display: block">
            <h2>General</h2>

            <form from method="POST" action="../php/setting.php">
              <div class="user-avatar">

                <?php if(GetData('imgf') == 0) : ?>
                  <img src="../Allphotos/forgot.jpg" alt="User Avatar" /><br />
                <?php else : ?>
                  <img src=<?php GetUserData('img') ?> alt="User Avatar" /><br />
                <?php endif; ?>

                <input type="hidden" name="imagestring">
                
                <input accept="image/*" id="previewImage" alt="User Avatar" type="file">
                
                <img id="show_image" src="">          
                <br />
              </div>
              <label for="username">Username:</label><br />
              <input
                type="text"
                id="username"
                name="username"
                value=<?php GetUserData('tag') ?>
              /><br />
              <label for="realname">Real Name:</label><br />
              <input
                type="text"
                id="realname"
                name="realname"
                value=<?php GetUserData('name') ?>
              /><br />
              <label for="tag1">Tag 1:</label><br />
              <input
                type="text"
                id="tag1"
                name="tag1"
                value=<?php GetUserData('tag1') ?>
              /><br />
              <label for="tag2">Tag 2:</label><br />
              <input
                type="text"
                id="tag2"
                name="tag2"
                value=<?php GetUserData('tag2') ?>
              /><br />
              <label for="tag3">Tag 3:</label><br />
              <input
                type="text"
                id="tag3"
                name="tag3"
                value=<?php GetUserData('tag3') ?>
              /><br />
              <!--<label for="email">Email:</label><br />
              <input
                type="email"
                id="email"
                name="email"
                placeholder=
              /><br />-->
              <label for="bio">Bio:</label><br />
              <textarea id="bio" name="bio"><?php GetUserData('profile') ?></textarea>
              <br />

              <button type="submit" style="background-color: #8c8c8c">Save Changes</button>
              <button type="button" onclick="cancelChanges()">Cancel</button>
              <br />
            </form>
          </div>
          <div id="change-password" class="setting-page">
            <h2>Change Password</h2>
            <form>
              <label for="current-password">Current Password:</label><br />
              <input
                type="password"
                id="current-password"
                name="current-password"
              /><br />
              <label for="new-password">New Password:</label><br />
              <input
                type="password"
                id="new-password"
                name="new-password"
              /><br />
              <label for="confirm-password">Confirm New Password:</label><br />
              <input
                type="password"
                id="confirm-password"
                name="confirm-password"
              /><br /><br />
              <button type="submit">Save Changes</button>
              <button type="button" onclick="cancelChanges()">Cancel</button>
            </form>
          </div>
          <!--<div id="profile-info" class="setting-page">
            <h2>Profile Info</h2>
            <form>
              <label for="bio">Bio:</label><br />
              <textarea id="bio" name="bio"></textarea><br />
              <label for="birthday">Birthday:</label><br />
              <input type="date" id="birthday" name="birthday" /><br />
              <label for="country">Country:</label><br />
              <select id="country" name="country">
                <option value="taiwan">Taiwan</option>
                <option value="usa">U.S.A.</option>
                <option value="uk">U.K.</option>
                <option value="japan">Japan</option>
                <option value="korea">Korea</option>
                </select
              ><br /><br />
              <button type="submit">Save Changes</button>
              <button type="button" onclick="cancelChanges()">Cancel</button>
            </form>
          </div>-->
          <div id="notification" class="setting-page">
            <h2>Notifications</h2>
            <br>
              <input
                checked
                type="checkbox"
                id="news"
                name="news"
                value="news"
              />
              <label for="news"
                >Email me when we have News and announcements</label
              ><br /><br />
              <input
                checked
                type="checkbox"
                id="product-updates"
                name="product-updates"
                value="product-updates"
              />
              <label for="product-updates">Weekly product updates</label
              ><br /><br />
              <button type="button">Save Changes</button>
              <button type="button" onclick="cancelChanges()">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      function showSetting(setting) {
        var pages = document.querySelectorAll(".setting-page");
        for (var i = 0; i < pages.length; i++) {
          pages[i].style.display = "none";
        }
        document.getElementById(setting).style.display = "block";
      }

      function cancelChanges() {
        alert("Changes canceled");
      }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    var imageProc = function (input) {
      if (input.files && input.files[0]) {
        // 建立一個 FileReader 物件
        var reader = new FileReader();

        // 當檔案讀取完後，所要進行的動作
        reader.onload = function (e) {
          // 顯示圖片
          $('#show_image')
          .attr("src", e.target.result)
          .css("display","inline-block")
          .css("width","100px")
          .css("border-radius","50%")
          .css("aspect-ratio","1/1")
          .css("background-image", e.target.result)
          .css("background-size","cover")
          .css("background-position","center")
          .css("print-color-adjust","exact")
          .css("-webkit-print-color-adjust","exact")
          // 將 DataURL 放到表單中
          $("input[name='imagestring']").val(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);

      }
    }

    $(document).ready(function() {
      // 綁定事件
      $("#previewImage").change(function () {
        imageProc(this);
      });
    });

    </script>
  </body>
</html>
