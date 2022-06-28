<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: /L4/main.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba4</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header class="header">
        <div class="header__container">
            <h1 class="form__text">Авторизация</h1>
        </div>
    </header>
    <main class="main">
        <div class="main__container">
            <div class="main__form-block">
                <form action="auth.php" method="post" class="main__form">
                    <input name="login" type="text" required placeholder="Логин" class="form__select">
                    <input name="pass" type="password" required placeholder="********" class="form__select">
                    <input style="display: block;" type="submit" name="submit" value="Войти" class="form__button">

                    <?php if (@$_SESSION["fail"] == "on") : ?>
                        <h2 class="form__text-red">Неверный логин или пароль.</h2>
                    <? endif; ?>
                </form>
                <div class="text-box">
                    <a class="form__text" href="/l4/registration.php">Регистрация</a>
                    <a class="form__text" href="/l4/main.php">Войти гостем</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>