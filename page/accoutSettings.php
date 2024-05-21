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
            <li>
              <a href="#" onclick="showSetting('profile-info')">Profile Info</a>
            </li>
            <li>
              <a href="#" onclick="showSetting('notification')">Notifications</a>
            </li>
          </ul>
        </div>
        <div id="main-content">
          <div id="basic-info" class="setting-page" style="display: block">
            <h2>General</h2>
            <form>
              <div class="user-avatar">
                <img src="../Allphotos/forky.jpg" alt="User Avatar" /><br />
                <input type="file" id="avatar" name="avatar" /><br />
              </div>
              <label for="username">Username:</label><br />
              <input
                type="text"
                id="username"
                name="username"
                placeholder="forky.0731"
              /><br />

              <label for="firstname">First Name:</label><br />
              <input
                type="text"
                id="firstname"
                name="firstname"
                placeholder="Forky"
              /><br />
              <label for="lastname">Last Name:</label><br />
              <input
                type="text"
                id="lastname"
                name="lastname"
                placeholder="Anderson"
              /><br />
              <label for="email">Email:</label><br />
              <input
                type="email"
                id="email"
                name="email"
                placeholder="forky0731@toy.story"
              /><br /><br />
              <button type="button">Save Changes</button>
              <button type="button" onclick="cancelChanges()">Cancel</button>
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
              <button type="button">Save Changes</button>
              <button type="button" onclick="cancelChanges()">Cancel</button>
            </form>
          </div>
          <div id="profile-info" class="setting-page">
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
              <button type="button">Save Changes</button>
              <button type="button" onclick="cancelChanges()">Cancel</button>
            </form>
          </div>
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
  </body>
</html>