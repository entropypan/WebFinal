<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Picruise</title>
  <link rel="stylesheet" href="../css/initiateDis.css">
  <link rel="stylesheet" href="../css/CreatePage.css">
</head>
<body style="background-image: url(../Allphotos/createback.jpg)">

  <?php require("../php/autoLogin.php"); 
  if(!isset($_SESSION['ID'])){
      echo "<script>alert('請先登入')</script>";
      echo "<script>location.href='../page/loginPage.html'</script>";
  }
  ?>

  <main>
    <header>
      <h1>Intense heated discussion:</h1>
    </header>
    <div class="info-section">
      <!-- 按鈕區域 -->
      <form id="info-form">
        <br /><br /><label for="topic">Topic:</label><br />
        <input type="text" id="initiate" name="initiate" placeholder="ex:Heavy Metal"><br />
        <form id="info-form">
          <div class="upload-section">
            <label for="photo">Photo:</label>
            <input type="file" id="upload-photo" accept="image/*" />
          </div><br />
          <label for="upload-photo" id="upload-label">Upload your photo</label>
          <br />
          <label for="equipment">Equipment:</label><br />
          <input
            type="text"
            id="equipment"
            name="equipment"
            placeholder="Fujifilm X-T4"
          /><br />
          <label for="time">Time:</label><br />
          <input
            type="date"
            id="time"
            name="time"
            max="today"
            value="today"
          /><br /><br />
          <label for="location">Location:</label><br />
          <input
            type="text"
            id="location"
            name="location"
            placeholder="Tainan"
          /><br /><br />
        <input type="submit" value="Submit">
      </form>
    </div>
  </main>
</body>
</html>
