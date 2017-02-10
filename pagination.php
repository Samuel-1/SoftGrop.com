<?php
function getAllArticles($start, $limit) {
    global $connect;
    $result = mysql_query("SELECT * FROM news LIMIT ".$start. ", ".$limit, $connect);
    $array = array();
    while ($row = mysql_fetch_assoc($result)) $array[] = $row;
    return $array;
}

function getStart($page, $limit) {
    return $limit * ($page - 1);
}

function countArticles() {
    global $connect;
    $result = mysql_query("SELECT COUNT(*) FROM news", $connect);
    $result = mysql_fetch_row($result);
    return $result[0];
}

function pagination($page, $limit) {
    $count_articles = countArticles();
    $count_pages = ceil($count_articles / $limit); // 10.2 => 11
    if ($page > $count_pages) {
        $page = $count_pages;
    }
    $prev = $page - 1;
    $next = $page + 1;
    if ($prev < 1) {
        $prev = 1;
    }
    if ($next > $count_pages) {
        $next = $count_pages;
    }
    $pagination = "";
    if ($count_pages > 1) {
        if ($page == 1) {
            $pagination .= "<span>Перша </span>";
            $pagination .= "<span>Попередня</span>";
        }
        else {
            $pagination .= "<a href='index.php'>Перша </a>";
            if ($prev == 1) {
                $pagination .= "<a href='index.php'>Попередня </a>";
            }
            else {
                $pagination .= "<a href='index.php?page=" /$prev . "'>Попередня</a>";
            }
        }
        for ($i = 1; $i <= $count_pages; $i++) {
            if ($i == 1) {
                $pagination .= "<a href='index.php'>". $i ."</a>";
            }
            else {
                if ($i == $page) {
                    $pagination .= "<span> ". $i ." </span>";
                }
                else {
                    $pagination .= "<a href='index.php?page=". $i ."'>". $i ."</a>";
                }
            }

        }
        if ($page == $count_pages) {
            $pagination .= "<span>Наступна </span>";
            $pagination .= "<span>Остання </span>";
        }
        else {
            $pagination .= "<a href='index.php?page=".$next."'>Наступна </a>";
            $pagination .= "<a href='index.php?page=".$count_pages."'>Остання </a>";
        }
    }
    return $pagination;
}

?>