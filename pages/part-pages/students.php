<?php
if ($url_part[1] != "account") {
    $datauser = [];
    $username = substr($url_part[1], 1);
    $q5 = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username'");
    while ($w = mysqli_fetch_array($q5)) {
        $datauser[] = $w;
        $userid = $w["id"];
    }
    ?><h1>Ученики <?php echo $datauser[0]["surname"] . " " . $datauser[0]["name"]; ?>:</h1><?php
} else {
    ?><h1>Мои ученики:</h1><?php
}
$userid = $datauser[0]["id"];
$q_st = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `teacherid` = $userid");
?>


<?php
    if ($datauser[0]["role"] == 2) {
    if ($url_part[1] == "account") {
        ?><a href="invites" class="big-border-button">Создать код-приглашение</a><?php
    }
    while ($w = mysqli_fetch_array($q_st)) {
        $this_userid = $w["id"];
        $q1_userinfo = mysqli_query($sql, "SELECT `complete` FROM `h_saves` WHERE `id_user` = $this_userid");
        $q2_userinfo = mysqli_query($sql, "SELECT `id` FROM `h_levels`");
        $count_level = 0;
        $comp_level = 0;
        while($w2 = mysqli_fetch_array($q1_userinfo)) {
            if ($w2["complete"] == 1) { $comp_level += 1; }
        }
        while($w2 = mysqli_fetch_array($q2_userinfo)) {
            if ($w2) { $count_level += 1; }
        }
        ?>
        <div class="student__card">
            <div><a href="/@<?php echo $w["username"];?>" class="student__card__title"><?php echo $w["name"] . " " . $w["surname"] . " - " . $w["username"]; ?></a>
            <a href="/@<?php echo $w["username"];?>/progress" class="student__card__progress">Прогресс: <?php echo $comp_level . " / " . $count_level . " - " . round($comp_level / $count_level * 100) . "%" ?></a></div>
            <a href="/modules/deletestud.php?id=<?= $w["id"] ?>" class="delete__button"></a>
        </div>
        <?php
    }
    } else {
        echo "<br>Вы не преподаватель";
    }
?>

