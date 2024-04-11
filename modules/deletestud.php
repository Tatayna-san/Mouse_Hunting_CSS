<?php 
require("connect.php");
session_start();
$userid = $_SESSION["ID"];
$needid = $_GET["id"];
$q = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `id` = $needid && `teacherid` = $userid");
$check = false;
while ($w = mysqli_fetch_array($q)) {
    if ($w) {
        $check = true;
    }
}
if ($check) {
    mysqli_query($sql, "UPDATE `h_users` SET `teacherid`=0, `invcode`='' WHERE `id` = $needid && `teacherid` = $userid");
}
Header("Location: /account/students");