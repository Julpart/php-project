<?php
session_start();
$_SESSION["fail"] = "off";
include "db.php";
$login = strip_tags($_POST["login"]);
$pass = strip_tags($_POST["pass"]);
$result = mysqli_query($db, "SELECT password FROM users WHERE login='{$login}'");
$password = mysqli_fetch_assoc($result);
if (empty($password['password']) || $pass != $password['password']) {
    $_SESSION["fail"] = "on";
    header("Location: /L4/index.php");
    die();
} else {
    $_SESSION['login'] = $login;
    header("Location: /L4/index.php");
    die();
    echo 2;
}
?>