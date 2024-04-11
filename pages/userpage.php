<div class="container userpage">
    <?php 
    $username = null;
    $q = null;
    $username = $_SESSION["LOGIN"];
    $q = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `username` = '$username'");
    $userid = $_SESSION["ID"];
    $datauser = [];
    $isuser = false;
    while($w = mysqli_fetch_array($q)) {
        $datauser[] = $w;
        if ($w) {
            $isuser = true;
        }
    }
    $q = mysqli_query($sql, "SELECT * FROM `h_notification` WHERE `user_id` = $userid && `checked` = 0");
    $checknotification = true;
    while($w = mysqli_fetch_array($q)) {
        if ($w) {
            $checknotification = false;
        }
    }
    if ($isuser) {?>
    <div class="userpage__left">
        <div class="userpage__left__image"></div>
        <h2 class="userpage__left__username"><span style="font-size: 1.3em">@</span><?php echo $datauser[0]["username"]?></h2>
        <ul class="userpage__left__menu">
            <li><a href="/account" class="userpage__left__menu__item">Личные данные</a></li>
            <li><a href="/account/progress" class="userpage__left__menu__item">Прогресс</a></li>
            <?php if ($datauser[0]["role"] == 2) {?>
                <li><a href="/account/students" class="userpage__left__menu__item">Ученики</a></li>
            <?php }?>
            <li><a href="/account/notification" class="userpage__left__menu__item <?php if (!$checknotification) { echo "nochecked";}?>">Уведомления</a></li>
            <li><a href="/account/settings" class="userpage__left__menu__item">Настройки</a></li>
            <!--<li><a class="userpage__left__menu__item">Поддержка</a></li>-->
        </ul>
    </div>
    <div class="userpage__right">
        <?php 
        if (isset($url_part[2])) {
            if ($url_part[2] == "") {
                require("pages/part-pages/userinfo.php");
            }
            if ($url_part[2] == "progress") {
                require("pages/part-pages/progress.php");
            }
            if ($url_part[2] == "notification") {
                require("pages/part-pages/notification.php");
            }
            if ($url_part[2] == "settings") {
                require("pages/part-pages/settings.php");
            }
            if ($url_part[2] == "students") {
                require("pages/part-pages/students.php");
            }
            if ($url_part[2] == "invites") {
                require("pages/part-pages/invites.php");
            }
        } else {
            require("pages/part-pages/userinfo.php");
        }
        ?>
    </div>
    <?php }?>
</div>