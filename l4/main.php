<?php
session_start();
if (isset($_POST['exit'])) {
    session_destroy();
    header("Location: /L4/index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="/L4/css/style.css">
</head>

<body>
    <header class="header">
        <div class="header__container">
            <div class="header__inline">
                <?php if (isset($_SESSION['login'])) : ?>
                    <form method="POST" class="header__inline">
                        <input type="submit" name="exit" value="Выход" class="form__button">

                        <h1 class="form__text">Пользователь: <?= $_SESSION["login"] ?></h1>

                    <? endif; ?>
                    </form>
                    <h2 class="form__text">Вы на главной странице</h2>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main__container">
            <?php if (isset($_SESSION['login'])) : ?>
                <div class="column">
                    <button class="form__button">AJAX Запрос</button>
                    <div id="result"></div>
                </div>
            <? else : ?>
                <p class="form__text">Здесь мог бы быть контент, но вы не авторизованы</p>
            <? endif; ?>
            <script>
                $('button').click(function() {
                    $("#result").load('/L4/main.html');
                });
            </script>

        </div>
    </main>
</body>

</html>