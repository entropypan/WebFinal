<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Picruise</title>
    <link rel="stylesheet" href="../css/CreatePage.css" />
  </head>
  <body style="background-image: url(../Allphotos/createback.jpg)">

    <?php 
    require("../php/autoLogin.php");
    require("../php/connectDB.php");
    require("../php/common.php"); 
    if(!isset($_SESSION['ID'])){
        echo "<script>alert('請先登入')</script>";
        echo "<script>location.href='../page/loginPage.html'</script>";
    }
    $tpc = $_GET["topic"];
    ?>

    <main>
      <div class="info-section">
        <!-- 按鈕區域 -->
        <form id="info-form" method="POST" action="../php/createP.php">
        <br /><label for="topic">Topic:</label><br />
        <input 
          type="text" 
          id="topic" 
          name="topic" 
          required="required" 
          readonly unselectable="on"  
          value="<?php echo ($tpc) ?>"><br />
        <label for="photo">Photo:</label><br />
        <form id="info-form">
          <div class="upload-section">
            <input type="hidden" name="imagestring">
            <input accept="image/*" id="previewImage" alt="User Avatar" type="file">

            <div class="preview_1">
              <img id="show_image" src="">
            </div>
            
          </div>
          <br/><br/>
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
            max="<?= date('Y-m-d'); ?>"
            value="<?= date('Y-m-d'); ?>"
          /><br /><br />
          <label for="location">Location:</label><br />
          <input
            type="text"
            id="location"
            name="location" 
            required="required"
            placeholder="Tainan"
          /><br /><br />
          <input type="submit" value="Submit" />
        </form>
      </div>
    </main>
  </body>
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
</html>