<?php
require("connect.php");
session_start();

if (isset($_SESSION['ID'])) {
    $level = $_POST['level'];
    $group = $_POST['group'];
    $data = "[".$_POST['data']."]";
    $userid = $_SESSION['ID'];
    $complete = $_POST['complete'];
    $q = mysqli_query($sql, "SELECT * FROM `h_saves` WHERE `id_user` = $userid && `level` = $level && `level_group` = $group");
    $neednew = true;
    while ($w = mysqli_fetch_array($q)) {
        if ($w) {
            $neednew = false;
        }
    }
    if (!$neednew) {
        mysqli_query($sql, "UPDATE `h_saves` SET `answer`='$data',`complete`=$complete WHERE `level` = $level && `level_group` = $group && `id_user` = $userid");
    } else {
        mysqli_query($sql, "INSERT INTO `h_saves`(`level`, `level_group`, `id_user`, `answer`, `complete`) VALUES ('$level','$group','$userid','$data',$complete)");
    }
    //
}
