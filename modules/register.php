<?php
    require("connect.php");
    date_default_timezone_set('Europe/Moscow');
    $username = mysqli_real_escape_string($sql, $_POST["username"]);
    $password = md5($_POST["password"]);
    $name = mysqli_real_escape_string($sql, $_POST["name"]);
    $surname = mysqli_real_escape_string($sql, $_POST["surname"]);
    $email = mysqli_real_escape_string($sql, $_POST["email"]);
    $invcode = false;
    if (isset($_POST["invcode"])) {
        $invcode = mysqli_real_escape_string($sql, $_POST["invcode"]);
    }
    $date = date("Y-m-d H:i:s");
    $id = null;
    $role = mysqli_real_escape_string($sql, $_POST["role"]);
    
    $q = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username'");
    $check = true;
    while ($w = mysqli_fetch_array($q)) {
        if ($w) {
            $check = false;
        }
    }
    if ($check) {
        if ($invcode) {
            $inv_check = false;
            $id_teacher = "";
            if ($invcode) {
                $q_inv = mysqli_query($sql, "SELECT * FROM `h_invites` WHERE `code` = '$invcode'");
                while ($w = mysqli_fetch_array($q_inv)) {
                    if ($w) {
                        $inv_check = true;
                        $id_teacher = $w["userid"];
                    }
                }
            }
            if ($invcode && $inv_check) {
                session_start();
                mysqli_query($sql, "INSERT INTO `h_users`(`username`, `password`, `role`, `datereg`, `name`, `surname`, `email`, `teacherid`, `invcode`) VALUES ('$username','$password','$role','$date','$name','$surname','$email',$id_teacher,'$invcode')");
                $q2 = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username'");
                while ($w2 = mysqli_fetch_array($q2)) {
                    $id = $w2["id"];
                }
                $_SESSION["LOGIN"] = $username;
                $_SESSION["ID"] = $id;
            } else {
                echo "Неправильный код приглашения или код недействительный";
            }
        } else {
            session_start();
            mysqli_query($sql, "INSERT INTO `h_users`(`username`, `password`, `role`, `datereg`, `name`, `surname`, `email`) VALUES ('$username','$password','$role','$date','$name','$surname','$email')");
            $q2 = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username'");
            while ($w2 = mysqli_fetch_array($q2)) {
                $id = $w2["id"];
            }
            $_SESSION["LOGIN"] = $username;
            $_SESSION["ID"] = $id;
        }
    } else {
        echo "Такой пользователь уже существует";
    }
?>