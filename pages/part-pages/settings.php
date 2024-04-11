<h1>Настройки</h1>
<?php 
    $userid = $_SESSION["ID"];
    $q_settings = mysqli_query($sql, "SELECT * FROM `h_users` WHERE `id` = $userid");
    $userdata = [];
    while($w3 = mysqli_fetch_array($q_settings)) {
        $userdata[] = $w3;
    }
?>
<form action="" method="post" class="setting__form">
    <h2>Обычные настройки</h2>
    <input type="text" name="formid" disabled value="1" style="display: none">
    <input type="text" name="name" placeholder="Имя" value="<?= $userdata[0]["name"] ?>" required>
    <input type="text" name="surname" placeholder="Фамилия" value="<?= $userdata[0]["surname"] ?>">
    <input type="text" name="username" placeholder="Ник" value="<?= $userdata[0]["username"] ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?= $userdata[0]["email"] ?>" required>
    <button type="submit">Отправить</button>
    <p class="setting__form__message"></p>
</form>
<form action="" method="post" class="setting__form">
    <h2>Смена пароля</h2>
    <input type="text" name="formid" disabled value="2" style="display: none">
    <input type="password" name="oldpass" placeholder="Старый пароль">
    <input type="password" name="newpass" placeholder="Новый пароль">
    <input type="password" name="twopass" placeholder="Повторите новый пароль">
    <button type="submit">Отправить</button>
    <p class="setting__form__message"></p>
</form>
<?php if ($datauser[0]["role"] == 1) {?>
    <form action="" method="post" class="setting__form">
        <h2>Код учителя:</h2>
        <input type="text" name="formid" disabled value="3" style="display: none">
        <input type="text" name="invcode" placeholder="Код учителя ABC123" value="<?= $userdata[0]["invcode"] ?>">
        <button type="submit">Отправить</button>
        <p class="setting__form__message"></p>
    </form>
<?php }?>
<script>
    async function a(mass, el) {
        console.log(mass);
        let b = new URLSearchParams();
        b.append("mass", JSON.stringify(mass));
        let f = await fetch("/modules/sendsettings.php", {body: b, method: "post"});
        let t = await f.text();
        if (t == "success") {
            window.location.href = '';
        } else {
            el.querySelector(".setting__form__message").textContent = t;
        }
    }
    document.querySelectorAll(".setting__form").forEach((el) => {
        el.onsubmit = (ev) => {
            ev.preventDefault();
            let obj = new Object();
            el.querySelectorAll("input").forEach((el2) => {
                obj[el2.name] = el2.value;
            })
            a(obj, el);
        }
    })
</script>