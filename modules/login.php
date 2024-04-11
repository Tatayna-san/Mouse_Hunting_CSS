<?php
    session_start();
    require("connect.php");
    $username = mysqli_real_escape_string($sql, $_POST["username"]);
    $password = md5($_POST["password"]);
    $id = null;
    
    $q = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username' && `password` = '$password'");
    $check = false;
    while ($w = mysqli_fetch_array($q)) {
        if ($w) {
            $check = true;
        }
    }
    if ($check) {
        $q2 = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username'");
        while ($w2 = mysqli_fetch_array($q2)) {
            $id = $w2["id"];
        }
        $_SESSION["LOGIN"] = $username;
        $_SESSION["ID"] = $id;
    } else {
        echo "Неправильный логин или пароль";
    }
?>