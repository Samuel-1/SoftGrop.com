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
            <?=$result['full_text']?>
            <hr>
            <br>
            <img src="<?=$result['upfile']?>" />
        <? endwhile;
        ?>

    </div>
<?php
include_once ("footer.php");
