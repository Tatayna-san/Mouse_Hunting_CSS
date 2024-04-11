<div class="container auth-page">
    <form action="" method="POST" id="log-form" class="form-style">
        <h1>Авторизация</h1>
        <p class="red-message"></p>
        <input type="text" name="username" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form>
</div>
<script>
    async function a() {
        let b = new URLSearchParams();
        b.append("username", document.querySelector("#log-form input[name='username']").value);
        b.append("password", document.querySelector("#log-form input[name='password']").value);
        let f = await fetch("modules/login.php", {method: "post", body: b});
        let t = await f.text();
        document.querySelector(".red-message").textContent = t;
        if (t == "") {
            window.location.href = "/";
        }
    }
    document.querySelector("#log-form").addEventListener("submit", (el) => {
        el.preventDefault();
        a();
    })
</script>