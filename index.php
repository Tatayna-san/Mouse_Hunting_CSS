<?php require("modules/connect.php"); 
date_default_timezone_set('Europe/Moscow');
session_start();
?>
<title>Mouse Hunting CSS</title>
<link rel="stylesheet" href="/style.css">
<div class="theme__div">
<?php if (isset($_SESSION["THEME"]) && $_SESSION["THEME"] == "dark") {
   ?><link rel="stylesheet" href="/styles/black_theme.css"><?php
    } else {
        $_SESSION["THEME"] = "white";
    }
?>
</div>

<div class="container">
    <?php
    include("modules/header.php");
    require("modules/router.php");
    ?>
</div>