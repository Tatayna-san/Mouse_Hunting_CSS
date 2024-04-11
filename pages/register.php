<div class="container auth-page">
    <form action="" method="POST" id="auth-form" class="form-style">
        <h1>Регистрация</h1>
        <p class="red-message"></p>
        <input type="text" name="username" placeholder="Логин" required autocomplete="off">
        <input type="password" name="password" placeholder="Пароль" required autocomplete="off">
        <input type="text" placeholder="Имя" name="name" required autocomplete="off">
        <input type="text" placeholder="Фамилия" name="surname" autocomplete="off">
        <input type="email" placeholder="Электронная почта" name="email" required autocomplete="off">
        <span style="margin-bottom: 10px">
            <input type="radio" name="role" id="role1" checked><label for="role1">Ученик</label>
            <input type="radio" name="role" id="role2"><label for="role2">Учитель</label>
        </span>
        <input type="text" id="invcode" name="invcode" placeholder="Код учителя ABC123">
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
<script>
    document.querySelectorAll("#role1, #role2").forEach((el) => {
        el.onchange = () => {
            if (document.querySelector("#role1").checked) {
                document.querySelector("#invcode").style.display = "flex";
            } else {
                document.querySelector("#invcode").style.display = "none";
                document.querySelector("#invcode").value = "";
            }
        }
    })
    async function a() {
        let b = new URLSearchParams();
        b.append("username", document.querySelector("#auth-form input[name='username']").value);
        b.append("password", document.querySelector("#auth-form input[name='password']").value);
        b.append("name", document.querySelector("#auth-form input[name='name']").value);
        b.append("surname", document.querySelector("#auth-form input[name='surname']").value);
        b.append("email", document.querySelector("#auth-form input[name='email']").value);
        if (document.querySelector("#invcode").value) {
            b.append("invcode", document.querySelector("#invcode").value);
        }
        if (document.querySelector("#auth-form input[id='role1']").checked == true) {
            b.append("role", 1);
        } else {
            b.append("role", 2);
        }
        let f = await fetch("modules/register.php", {method: "post", body: b});
        let t = await f.text();
        document.querySelector(".red-message").textContent = t;
        if (t == "") {
            window.location.href = "/";
        }
    }
    document.querySelector("#auth-form").addEventListener("submit", (el) => {
        el.preventDefault();
        a();
    })
</script>