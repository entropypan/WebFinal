<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Picruise</title>
  <link rel="stylesheet" href="../css/initiateDis.css">
</head>
<body style="background-image: url(../Allphotos/createback.jpg)">

  <?php require("../php/autoLogin.php"); 
  if(!isset($_SESSION["id"])){
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
        <input type="text" id="initiate" name="initiate" placeholder="ex:Heavy Metal"><br>
        <input type="submit" value="Submit">
      </form>
    </div>
  </main>
</body>
</html>
