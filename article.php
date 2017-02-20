<?php
include_once ("head.php");
?>
    <div id = "content">
        <?php
        $post_id = (int)mysql_real_escape_string($_GET['id']);
        $select = mysql_query("SELECT * FROM news WHERE id = '".$post_id."';");
        while($result = mysql_fetch_array($select)) :?>
            <h1><a href=""><?=$result['title']?></a></h1>
            <hr>
            <br>
            <img src="<?=$result['upfile']?>" />
            <?=$result['full_text']?>
            <hr>
            <br>

        <div class="comments">
            <?php

            if (isset($_POST["add"])) {
                $text = strip_tags(trim($_POST['text']));
                $query = "INSERT INTO comments 
                  SET 
                    text = '".$text."',
                    post_id = '".$post_id."';";
                    mysql_query($query);
            }?>

            <h2>Коментарі:</h2>
            <?$comments = mysql_query("SELECT * FROM comments WHERE post_id = '".$post_id."';");?>
            <ol>
                <?while($result = mysql_fetch_array($comments)) :?>
                    <li class="comment">
                        <?=$result['text']?>
                    </li>
                <?endwhile;?>
            </ol>
        </div>
        <? endwhile; ?>
        <form action="/article.php?id=<?=$post_id?>" method="post">
            Залишити свою думку тут:
            <textarea name="text" rows="5" cols="45"> </textarea><br>
            <input type="submit" name="add" value="Додати"><br><br>
        </form>

    </div>
<?php
mysql_close();
include_once ("footer.php");
