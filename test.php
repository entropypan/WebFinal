<html>
<head>
    <meta charset="utf-8">
    <title>Q:PHP如何取得HTML 日曆選擇器的值</title>
</head>
<body>
<form action="" method="post">
    select_date :
    <input type="date" value="<?= isset($_POST['get_date']) ? $_POST['get_date'] : ''; ?>" name="get_date"
                         min="<?= date('Y-m-d'); ?>">
    <input type="submit" value="submit_date">
</form>

<?php
if (isset($_POST['get_date'])) {
    echo '<hr>' . 'get_date : ' . $_POST['get_date'];
}
?>
</body>
</html>