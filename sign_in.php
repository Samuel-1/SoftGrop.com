<?php
include_once ("db.php");
    if (isset($_POST['enter'])) {
        $e_login = $_POST['e_login'];
        $e_password = ($_POST['e_password']);
        $query = mysql_query("SELECT * FROM user WHERE login = '$e_login'") or die(mysql_error());
        $user_data = mysql_fetch_array($query);
            if ($user_data['password'] == $e_password){
                    if ($user_data['password'] == '123'){
                        header("Location:post.php");
                    }
                    else {
                        header("Location:index.php");
                    }
            }
            else{
                echo "Повторіть спробу";
            }
    }
?>
<!--<div id = "form_sign_in">-->
<meta charset="utf-8">
    <form method ="post" action= "sign_in.php">
        <input type="text" name="e_login" placeholder="login"/>
        <input type="password" name="e_password" placeholder="Password"/>
        <input type="submit" name="enter" value="Ok"/>
    </form>
<a href="registr.php">Зареєструватия</a>
<!--</div>-->