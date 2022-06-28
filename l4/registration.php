<?php
session_start();
include "db.php";
$registration = false;
if (isset($_POST["login_reg"]) &&  isset($_POST["email_reg"]) && isset($_POST["pass_reg"])) {
    $login = strip_tags($_POST["login_reg"]);
    $email = strip_tags($_POST["email_reg"]);
    $pass = strip_tags($_POST["pass_reg"]);
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='{$login}' or mail='{$email}'");
    $answer = mysqli_fetch_assoc($result);
    $registration = true;
    if (empty($answer)) {
        $insert = mysqli_query($db, "INSERT INTO users (login,password,mail) VALUES('{$login}','{$pass}','{$email}')");
        if ($insert) {
            $_SESSION["login"] = $login;
            header("Location: /L4/main.php");
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>


    <header class="header">
        <div class="header__container">
            <h1 class="form__text">Регистрация</h1>
        </div>
    </header>
    <main class="main">
        <div class="main__container">
            <div class="main__form-block">
                <form method="post" class="main__form">
                    <input name="login_reg" type="text" required placeholder="Логин" class="form__select">
                    <input name="email_reg" type="email" required placeholder="userexample@mail.ru" class="form__select">
                    <input name="pass_reg" type="password" required placeholder="********" class="form__select">
                    <input type="submit" name="submit" value="Регистрация" class="form__button">

                    <?php if ($registration) : ?>
                        <h1 class="form__text-red">Пользователь с таким логином или email уже существует</h1>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </main>
</body>

</html>