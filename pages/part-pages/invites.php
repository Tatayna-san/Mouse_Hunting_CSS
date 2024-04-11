<?php
$userid = $datauser[0]["id"];
$q_st = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `teacherid` = $userid");
?>

<h1>Мои приглашения:</h1>

<?php
    if ($datauser[0]["role"] == 2) {
        ?>
        <a href="../modules/invitegen.php" class="big-border-button">Создать приглашение</a>
        <div class="invite__cards">
        <?php
        $q_inv = mysqli_query($sql, "SELECT * FROM `h_invites` WHERE `userid` = $userid");
        while($w = mysqli_fetch_array($q_inv)) {
            ?><div class="invite__card">
                <h2>Приглашение <?php echo $w["code"] ?></h2>
                <a href="/modules/deleteinv.php?id=<?= $w["id"] ?>" class="delete__button"></a>
            </div><?php
        }
        ?></div><?php
    } else {
        echo "<br>Вы не преподаватель";
    }
?>

