<?php
require("connect.php");
session_start();

if (isset($_SESSION['ID'])) {
    $userid = $_SESSION['ID'];
    $q = mysqli_query($sql, "SELECT `level`, `level_group`, `answer` FROM `h_saves` WHERE `id_user` = $userid");
    $mass = [];
    while ($w = mysqli_fetch_array($q)) {
        $mass[] = $w;
    }
    echo json_encode($mass, JSON_UNESCAPED_UNICODE);
}
