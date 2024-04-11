<h1>Уведомления</h1>
<?php 
    $userid = $_SESSION["ID"];
    $q = mysqli_query($sql, "SELECT * FROM `h_notification` WHERE `user_id` = $userid ORDER BY `h_notification`.`time` DESC");
    while ($w = mysqli_fetch_array($q)) {
        ?>
            <a <?php if($w["href"] != "") { echo 'href="'.$w["href"].'"'; }?> class="notification__card <?php if (!$w["checked"]) {echo "nochecked";}?>">
                <h2><?= $w["title"] ?></h2>
                <p><?= $w["text"] ?></p>
            </a>
        <?php
    }
    mysqli_query($sql, "UPDATE `h_notification` SET `checked` = 1 WHERE `checked` = 0");
?>