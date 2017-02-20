<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="http://softgrop.com/">На головну</a>
<div id = "post">
    <form method="post" action="post.php" enctype="multipart/form-data">
        Заголовок новини <br>
        <input type="text" name="title"><br>

        Текст<br>
        <textarea id="editor1" name="full_text"></textarea>

        Додати мініатюру<br>
        <input type="file" name="upfile"><br><br>

        <select name="category">
            <?php include_once ("db.php");
                $res=mysql_query( "select * from category");
                while($row=mysql_fetch_array($res)):?>
                <option value="<?=$row['id']?>"><?=$row['title_category']; ?></option>
            <?php endwhile; ?>
        </select><br><br>
        <input type="submit" name="add" value="Додати">
        <br>
        <br>
    </form>
</div>

<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include_once ("db.php");
if(isset($_POST['add'])){
    $url = "";

    if(isset($_FILES['upfile'])){

        $dir_name = dirname(__FILE__)."\\image\\";
        $url = "/image/".basename($_FILES['upfile']['name']);

        if($_FILES['upfile'] ['error'] == 0) {
            if($_FILES['upfile'] ['size'] <= 100000){
                if(($_FILES['upfile'] ['type'] == "image/jpeg") ||
                    ($_FILES['upfile'] ['type'] == "image/png") ||
                    ($_FILES['upfile'] ['type'] == "image/gif") ||
                    ($_FILES['upfile'] ['type'] == "image/bmp") ||
                    ($_FILES['upfile'] ['type'] == "image/jpg")) {

                    if ( move_uploaded_file($_FILES['upfile']['tmp_name'], $dir_name.basename($_FILES['upfile']['name'])) )
                        echo "Було скопійовано один файл";
                    else {
                        echo "НЕ Було скопійовано один файл";
                    }
                }
                else {
                    echo "Не правильний тип";
                }
            }
            else {
                echo "Помилка з розміром файлу";
            }
        }
    }

    $title = strip_tags(trim($_POST['title']));
    $full_text = strip_tags(trim($_POST['full_text']));
    $category_id = (int)strip_tags(trim($_POST['category']));

    $query = "INSERT INTO news SET 
                title = '".$title."',
                full_text = '".$full_text."',
                upfile = '".$url."',
                category_id = '".$category_id."';";
    mysql_query($query);
    mysql_close();
}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1', {
        uiColor: '#CCEAEE'
    } );
</script>
</body>
</html>
