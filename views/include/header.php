<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/conf/setting.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinobanda</title>

    <link rel="stylesheet" href="/assets/css/style.css" ?>
    <link rel="stylesheet" href="/assets/css/filterBlock.css">
    <link rel="stylesheet" href="/assets/css/search.css">
    <link rel="stylesheet" href="/assets/css/comment.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/register.css">
    <link rel="stylesheet" href="/assets/css/media.css">
    <link rel="stylesheet" href="/assets/css/mediamovie.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<header>
    <div class="header-top">
        <div class="container">

            <div class="logo">
                <a href="../../index.php">
                    <img src="/assets/img/logo.png" alt="logo"/>
                </a>
            </div>

            <form id="searchForm">
                <div class="search">
                    <input id="search__input" type="text" name="search" placeholder="Шукати">
                    <div id="search__button">
                        <button><img src="/assets/img/search.svg" alt="search"/></button>
                    </div>
                </div>
            </form>

            <?php if (isset($_COOKIE['user'])) { ?>
                <div>
                    <button class="sign" id="signOut" href="#">Вихід</button>
                </div>

            <?php } else { ?>
                <div class="link">
                    <a class="sign" href="<?php echo $siteName . '/views/login.php'; ?>">Увiйти</a>
                    <a class="rega" href="<?php echo $siteName . '/views/register.php'; ?>">Реєстрація</a>
                </div>

            <?php } ?>
        </div>
    </div>
</header>