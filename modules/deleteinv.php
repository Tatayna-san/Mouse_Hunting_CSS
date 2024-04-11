<?php 
require("connect.php");
session_start();
$userid = $_SESSION["ID"];
$needid = $_GET["id"];
$q = mysqli_query($sql, "SELECT * FROM `h_invites` WHERE `id` = $needid && `userid` = $userid");
$check = false;
while ($w = mysqli_fetch_array($q)) {
    if ($w) {
        $check = true;
    }
}
if ($check) {
    mysqli_query($sql, "DELETE FROM `h_invites` WHERE `id` = $needid && `userid` = $userid");
}
Header("Location: /account/invites");