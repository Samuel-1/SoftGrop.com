<?php $connect = mysql_connect('localhost', 'root','') or die(mysql_error());
    mysql_select_db('blog');
    mysql_set_charset("utf-8");
?>