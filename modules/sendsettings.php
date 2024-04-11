<?php
session_start();
require("connect.php");
$mass = json_decode($_POST["mass"]);
$formid = mysqli_real_escape_string($sql, $mass->formid);
$userid = $_SESSION["ID"];
$username2 = $_SESSION["LOGIN"];

if ($formid == 1) {
    $name = mysqli_real_escape_string($sql, $mass->name);
    $surname = mysqli_real_escape_string($sql, $mass->surname);
    $username = mysqli_real_escape_string($sql, $mass->username);
    $email = mysqli_real_escape_string($sql, $mass->email);

    $check = true;
    $q = mysqli_query($sql, "SELECT `username` FROM `h_users` WHERE `username` = '$username'");
    while ($w = mysqli_fetch_array($q)) {
        if ($w && $username != $username2) {
            $check = false;
        }
    }

    if ($check) {
        mysqli_query($sql, "UPDATE `h_users` SET `username`='$username',`name`='$name',`surname`='$surname',`email`='$email' WHERE `id` = $userid");
        $_SESSION["LOGIN"] = $username;
        echo "success";
    } else {
        echo "Пользователь с таким логином уже есть";
    }
}

if ($formid == 2) {
    $oldpass = $mass->oldpass;
    $newpass = $mass->newpass;
    $twopass = $mass->twopass;
    $passmd5 = md5($oldpass);
    $pass2md5 = md5($newpass);

    $check = false;
    $q = mysqli_query($sql, "SELECT `username` FROM `h_users` WHERE `username` = '$username2' && `password` = '$passmd5'");
    while ($w = mysqli_fetch_array($q)) {
        if ($w) {
            $check = true;
        }
    }

    if ($check) {
        if ($newpass == $twopass) {
            mysqli_query($sql, "UPDATE `h_users` SET `password`='$pass2md5' WHERE `id` = $userid");
            echo "success";
        } else {
            echo "Пароли не совпадают";
        }
        
    } else {
        echo "Неправильный пароль";
    }
}
if ($formid == 3) {
    $invcode = mysqli_real_escape_string($sql, $mass->invcode);
    $teacher_id = null;

    $check = false;
    $q = mysqli_query($sql, "SELECT * FROM `h_invites` WHERE `code` = '$invcode'");
    while ($w = mysqli_fetch_array($q)) {
        if ($w) {
            $check = true;
            $teacher_id = $w["userid"];
        }
    }
    if ($invcode == "") {
        $check = true;
    }

    if ($check) {
        if ($invcode != "") {
            mysqli_query($sql, "UPDATE `h_users` SET `invcode`='$invcode', `teacherid`=$teacher_id WHERE `id` = $userid");
        } else {
            mysqli_query($sql, "UPDATE `h_users` SET `invcode`=0, `teacherid`=0 WHERE `id` = $userid");
        }
        echo "success";
    } else {
        echo "Такого кода не существует";
    }
}