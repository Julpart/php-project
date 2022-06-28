<?php
$r = NULL;
if ($_SERVER['REQUEST_METHOD'] == 'GET') $r = $_GET;
else $r  = $_POST;
$score = 0;
if (@$r["quest1-2"] && @!$r["quest1-1"] && @!$r["quest1-3"]) $score++;
if (@$r["quest2"] == 1) $score++;
if (@$r["quest3"] == 2) $score++;

$file = fopen("test.txt", "a");
fwrite($file, "Пользователь: " . $_SERVER['HTTP_USER_AGENT'] . "\r\n");
fwrite($file, "Дата: " . date("Y-m-d H:i:s") . "\r\n");
fwrite($file, "Результат: " . $score . "/3\r\n\r\n");
fclose($file);
setcookie("user", $_SERVER['HTTP_USER_AGENT']);
setcookie("date", date("Y-m-d H:i:s"));
setcookie("result", $score);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba3</title>
</head>

<body>
    <h1>Результат: </h1>
    <h2><?= $score ?>/3</h2>
    <br>
    <?php if (@$_COOKIE["user"] == $_SERVER['HTTP_USER_AGENT']) : ?>
        <h1>Прошлая попытка</h1><br>
        <h2>Результат: <?= $_COOKIE["result"] ?></h2><br>
        <h2>Дата: <?= $_COOKIE["date"] ?></h2><br>
    <?php endif ?>
    <a href="/L3/test.php">Общие результаты</a>

</body>

</html>