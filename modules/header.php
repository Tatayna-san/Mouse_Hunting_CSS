<?php
$checknotification = true;
if (isset($_SESSION["ID"])) {
    $userid = $_SESSION["ID"];
    $q_notification = mysqli_query($sql, "SELECT * FROM `h_notification` WHERE `user_id` = $userid && `checked` = 0");
    while($w = mysqli_fetch_array($q_notification)) {
        if ($w) {
            $checknotification = false;
        }
    }
}

?>
<div class="game__header">
    <div class="theme__button<?php if ($_SESSION["THEME"] == "dark") {echo " dark";}?>"></div>
    <ul class="game__header__menu">
    <li><a href="/">Главная страница</a></li>
    <li><a href="/about">О нас</a></li>
    <?php if (!isset($_SESSION["ID"])) {?><li><a href="/register">Регистрация</a></li><?php }?>
    <?php if (!isset($_SESSION["ID"])) {?><li><a href="/login">Логин</a></li><?php }?>
    <?php if (isset($_SESSION["ID"])) {?><li class="<?php if ($checknotification == false) {echo 'nochecked';}?>"><a href="/account/notification">Уведомления</a></li><?php }?>
    <?php if (isset($_SESSION["ID"])) {?><li><a href="/account">Аккаунт</a></li><?php }?>
    <?php if (isset($_SESSION["ID"])) {?><li><a href="/logout">Выйти</a></li><?php }?>
    <?php if (isset($_SESSION["ID"])) {?><li><a class="avatar_href" href="/@<?php echo $_SESSION["LOGIN"]?>"></a></li><?php }?>
    </ul>
</div>
<script>
    async function func1() {
        let f = await fetch("/modules/theme/darkset.php");
        let t = await f.text();
        console.log(t);
    }
    async function func2() {
        let f = await fetch("/modules/theme/whiteset.php");
    }
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector(".theme__button").onclick = () => {
            if (document.querySelector(".theme__button").classList.contains("dark") == false) {
                func1();
                document.querySelector(".theme__button").classList.add("dark")
                document.querySelector(".theme__div").innerHTML = '<link rel="stylesheet" href="/styles/black_theme.css">';
                document.querySelectorAll(".theme_obj.white").forEach((obj) => {
                    obj.style.display = "none";
                })
                document.querySelectorAll(".theme_obj.dark").forEach((obj) => {
                    obj.style.display = "flex";
                })
            } else {
                func2();
                document.querySelector(".theme__button").classList.remove("dark")
                document.querySelector(".theme__div").innerHTML = '';
                document.querySelectorAll(".theme_obj.white").forEach((obj) => {
                    obj.style.display = "flex";
                })
                document.querySelectorAll(".theme_obj.dark").forEach((obj) => {
                    obj.style.display = "none";
                })
            }
        }
    })
</script>