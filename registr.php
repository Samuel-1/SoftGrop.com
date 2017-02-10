<?php
   include_once ("db.php");
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $r_password = $_POST['r_password'];
        if($password == $r_password) {
            $password = ($password);
            $query = mysql_query("INSERT INTO user VALUES ('','$username', '$login', '$password')") or die(mysql_error());
            if($password == $r_password) {
                header("Location:index.php");
            }
        }
        else{
            die('You entered the wrong data, try again');
        }
    }
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div  id = "form_registr">
    <form method ="post" action="registr.php">
        <input type="text" name="username" placeholder="Name"/><br>
        <input type="text" name="login" placeholder="login"/><br>
        <input type="password" name="password" placeholder="Password"/><br>
        <input type="password" name="r_password" placeholder="Repeat password"/><br>
        <input type="submit" name="submit" value="Ok"/>
        </form>
</div>