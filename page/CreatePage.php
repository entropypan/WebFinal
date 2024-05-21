<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Picruise</title>
    <link rel="stylesheet" href="../css/CreatePage.css" />
  </head>
  <body style="background-image: url(../Allphotos/createback.jpg)">

    <?php require("../php/autoLogin.php"); 
    if(!isset($_SESSION['ID'])){
        echo "<script>alert('請先登入')</script>";
        echo "<script>location.href='../page/loginPage.html'</script>";
    }
    ?>

    <main>
      <div class="info-section">
        <!-- 按鈕區域 -->
        <form id="info-form">
          <div class="upload-section">
            <label for="photo">Photo:</label>
            <input type="file" id="upload-photo" accept="image/*" />
          </div>
          <label for="upload-photo" id="upload-label">Upload your photo</label>
          <label for="equipment">Equipment:</label><br />
          <input
            type="text"
            id="equipment"
            name="equipment"
            placeholder="Fujifilm X-T4"
          /><br />
          <label for="time">Time:</label><br />
          <input
            type="text"
            id="time"
            name="time"
            placeholder="2024/04/05"
          /><br />
          <label for="location">Location:</label><br />
          <input
            type="text"
            id="location"
            name="location"
            placeholder="Tainan"
          /><br /><br />
          <input type="submit" value="Submit" />
        </form>
      </div>
    </main>
  </body>
</html>