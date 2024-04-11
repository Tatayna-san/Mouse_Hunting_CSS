<?php

$url = $_SERVER["REQUEST_URI"];
$url_part = explode("/", $url);



if ($url_part[1] == "game" || $url_part[1] == "" || $url_part[1] == "index.php") {
    require("pages/game.php");
}
if ($url_part[1] == "register") {
    require("pages/register.php");
}
if ($url_part[1] == "login") {
    require("pages/login.php");
}
if ($url_part[1] == "logout") {
    require("modules/logout.php");
}
if ($url_part[1] == "home" || $url_part[1] == "about") {
    require("pages/home.php");
}
if (substr($url_part[1], 0, 1) == "@" || $url_part[1] == "account") {
    require("pages/userpage.php");
}