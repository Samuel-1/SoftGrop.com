<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="http://softgrop.com/">На головну</a>
    <form method="post" action="category.php" enctype="multipart/form-data">
        Добавити категорію<br>
        <input type="text" name="title_category">
        <input type="submit" name="add" value="Додати"><br>
    </form>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once ("db.php");
if (isset($_POST["add"])) {
    $title_category = strip_tags(trim($_POST['title_category']));
    $query = "INSERT INTO category SET title_category = '".$title_category."';";
    mysql_query($query);
    mysql_close();
}
?>
</body>
</html>
