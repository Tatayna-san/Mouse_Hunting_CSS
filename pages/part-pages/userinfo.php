<?php
    $userid = $_SESSION["ID"];
    if ($url_part[1] != "account") {
        $datauser = [];
        $username = substr($url_part[1], 1);
        $q5 = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username'");
        while ($w = mysqli_fetch_array($q5)) {
            $datauser[] = $w;
            $userid = $w["id"];
        }
    }
    //print_r($datauser[0]);
    $q1_userinfo = mysqli_query($sql, "SELECT `complete` FROM `h_saves` WHERE `id_user` = $userid");
    $q2_userinfo = mysqli_query($sql, "SELECT `id` FROM `h_levels`");
    $count_level = 0;
    $comp_level = 0;
    while($w = mysqli_fetch_array($q1_userinfo)) {
        if ($w["complete"] == 1) {
            $comp_level += 1;
        }
    }
    while($w = mysqli_fetch_array($q2_userinfo)) {
        if ($w) {
            $count_level += 1;
        }
    }
?>

<h1>Информация о пользователе</h1>
<h2>Статус пользователя: <?php if ($datauser[0]["role"] == 1) {echo "Ученик";}?><?php if ($datauser[0]["role"] == 2) {echo "Преподаватель";}?></h2>
<h2>Имя: <?php echo $datauser[0]["name"]?></h2>
<h2>Фамилия: <?php echo $datauser[0]["surname"]?></h2>
<h2>Ник: <?php echo $datauser[0]["username"]?></h2>
<h2>Электронная почта: <?php echo $datauser[0]["email"]?></h2>
<?php if ($datauser[0]["teacherid"] && $datauser[0]["teacherid"] != 0) {
        $teacherid = $datauser[0]["teacherid"];
        $q_teacher = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `id` = $teacherid");
        while ($w = mysqli_fetch_array($q_teacher)) {
            ?>
                <h2>Имя учителя: <?php echo $w["surname"] . " " . $w["name"] . " <a href='/@". $w["username"] ."'>(@" . $w["username"] . ")</a>" ?></h2>
            <?php
        }
    }?>
<br>
<?php if ($datauser[0]["role"] == 1) {?>
<h2>Прогресс:</h2>
<div class="theme_obj dark" <?php if ($_SESSION["THEME"] == "white") { echo 'style="display: none;"';}?>>
    <div class="progress_circle" style="background: conic-gradient(#7086ff 0deg <?php echo ($comp_level / $count_level * 360) ?>deg, #171b30 0deg);">
        <span style="z-index: 1"><?php echo round($comp_level / $count_level * 100) ?>%</span>
    </div>
</div>
<div class="theme_obj white" <?php if ($_SESSION["THEME"] == "dark") { echo 'style="display: none;"';}?>>
    <div class="progress_circle" style="background: conic-gradient(#6cddff 0deg <?php echo ($comp_level / $count_level * 360) ?>deg, #224752 0deg);">
        <span style="z-index: 1"><?php echo round($comp_level / $count_level * 100) ?>%</span>
    </div>
</div>
<?php }?>
<a href="/<?php if ($url_part[1] != "account") {echo "@" . $datauser[0]["username"]; } else {echo "account";}?>/progress" class="medium-button">Перейти к прогрессу</a>
<?php if ($datauser[0]["role"] == 2) {?>
    <a href="/<?php if ($url_part[1] != "account") {echo "@" . $datauser[0]["username"]; } else {echo "account";}?>/students" class="medium-button">Перейти к ученикам</a>
<?php }?>