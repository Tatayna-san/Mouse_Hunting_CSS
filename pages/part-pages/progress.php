<?php 
    $iduser;
    if ($url_part[1] == "account") {
        $iduser = $_SESSION["ID"];
        ?><h1>Прогресс / Уровни:</h1><?php
    } else {
        $username = substr($url_part[1], 1);
        $q5 = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username'");
        $user_name;
        $user_surname;
        while ($w = mysqli_fetch_array($q5)) {
            $iduser = $w["id"];
            $user_name = $w["name"];
            $user_surname = $w["surname"];
        }
        ?><h1>Прогресс ученика <?php echo $user_name . " " . $user_surname ?>:</h1><?php
    }
    $q3 = mysqli_query($sql, "SELECT * FROM `h_levels`");
    $q4 = mysqli_query($sql, "SELECT `level`, `complete`, `level_group` FROM `h_saves` WHERE `id_user` = $iduser");
?>
<div class="cabinet__level-group">
    <div style="display: flex">
    <?php 
        $l_saves = [];
        while ($w2 = mysqli_fetch_array($q4)) {
            $l_saves[] = $w2;
        }
        while ($w = mysqli_fetch_array($q3)) {
            $complete = false;
            foreach($l_saves as $x) {
                if ($x['level'] == $w['number'] && $x['level_group'] == $w["group_"] && $x['complete']) {
                    $complete = true;
                }
            }
        ?>
        <?php if ($w["number"] == 1 && $w["group_"] != 1) { echo "</div><div style='display: flex'>";}?>
        <a href="/game/?level=<?php echo $w["number"]?>&group=<?php echo $w["group_"]?>" class="cabinet__level-group__item <?php if ($complete) {echo "complete";}?>"><?php echo $w["number"]?></a>
    <?php }?>
    </div>
</div>