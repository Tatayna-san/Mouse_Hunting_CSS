<?php
require("connect.php");
session_start();
if (isset($_SESSION["ID"])) {
    $userid = $_SESSION["ID"];
    $q = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `id` = '$userid'");
    $datauser = [];
    while($w = mysqli_fetch_array($q)) {
        $datauser[] = $w;
    }
    if ($datauser[0]["role"] == 2) {
        $newcode = substr(md5(time()), -6);
        mysqli_query($sql, "INSERT INTO `h_invites`(`userid`, `code`) VALUES ($userid,'$newcode')");
        Header("Location: /account/invites");
    }
}
