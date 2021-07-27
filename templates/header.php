<?php
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['username'])) {
    if (($_SERVER['REQUEST_URI'] !== '/') && ($_SERVER['QUERY_STRING'] !== 'login=yes')) {
        header('Location: /');
        die();
    }
}

if (isset($_GET['login']) && $_GET['login'] == 'no') {
    unset($_SESSION['username']);
    session_destroy();
    header('Location: /');
}

if ((isset($_SESSION["username"])) && ($_SESSION["username"] === "loggedIn")) {
    setcookie('login', $_COOKIE['login'], time() + 60 * 60 * 24 * 31, '/');
}

$passwordValue = htmlspecialchars($_POST['password'] ?? '');
$loginValue = htmlspecialchars($_POST['login'] ?? '');

if (!empty($_POST)) {
    include $_SERVER['DOCUMENT_ROOT'] . '/include/logins.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php';
    if (!empty($_COOKIE['login'])) {
        $index = array_search($_COOKIE['login'], $logins, true);
    } else {
        $index = array_search($loginValue, $logins, true);
    }
    $isAuth = $index !== false && $passwordValue == $passwords[$index];

    if ($isAuth) {
        $_SESSION["username"] = "loggedIn";
        if (empty($_COOKIE['login'])) {
            setcookie('login', $loginValue, time() + 60 * 60 * 24 * 31, '/');
        }
    }
}
include $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/headerAdder.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>


<div class="clear">
    <?php
    showMenu(arraySort($main_menu, 'sort', SORT_ASC), '');
    ?>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">
            <h1><?= headerAdder($main_menu); ?></h1>
            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делиться списками с
                друзьями и просматривать списки друзей.</p>
        </td>