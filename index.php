<?php
include_once ("head.php");
require_once "pagination.php";
?>
    <div id = "content">
        <?php
            $page = $_GET["page"];
            if(($page < 1) or ($page == "")){
                $page = 1;
            }
            $limit = 10;
            $start = getStart($page, $limit);
            $articles = getAllArticles($start, $limit);
            foreach ($articles as $article):?>
                <h2><a href="/article.php?id=<?=$article['id']?>"><?=$article['title']?></a></h2><hr><br>
                <?=substr($article['full_text'], 0, 200)?>...<br>
                <img src="<?=$article['upfile']?>" />
                <hr>
            <?endforeach;
            echo pagination($page, $limit);
        ?>
    </div>
<?php
include_once ("footer.php");
?>