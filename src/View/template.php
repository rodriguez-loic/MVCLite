<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ title }}</title>

        <meta name="theme-color" content="#ffffff">

        <meta name="viewport" content="initial-scale=1">

        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

        <link href="/asset/css/vendor/fa-5.14.0-all.min.css" rel="stylesheet">
        <link href="/asset/css/vendor/jquery-ui.min.css" rel="stylesheet">
        <link href="/asset/css/vendor/jquery-ui.structure.min.css" rel="stylesheet">
        <link href="/asset/css/vendor/jquery-ui.theme.min.css" rel="stylesheet">
        <link href="/asset/css/vendor/jquery-confirm.css" rel="stylesheet">
        <link href="/asset/css/vendor/normalize-3.0.3.css" rel="stylesheet">

        <link href="/asset/css/app.css" rel="stylesheet">
        <link href="/asset/css/app-grid.css" rel="stylesheet">
        <link href="/asset/css/app-menu.css" rel="stylesheet">
        <link href="/asset/css/app-menu-left.css" rel="stylesheet">
        <link href="/asset/css/app-menu-round.css" rel="stylesheet">
        <link href="/asset/css/app-banner.css" rel="stylesheet">
        <link href="/asset/css/app-form.css" rel="stylesheet">
        <link href="/asset/css/app-colors.css" rel="stylesheet">
    </head>
    <body>
        <!--<div id="lr-banner">
            <div class="lr-row">
                <h1 class="lr-title">{{ header }}</h1>
            </div>
        </div>-->

        <nav id="lr-menu-round">
            <ul>
                <li title="Lorem"><a href="" alt=""><i class="fas fa-cogs"></i></a></li>
                <li title="Ipsum"><a href="" alt=""><i class="fas fa-book"></i></a></li>
                <li title="Dolor"><a href="" alt=""><i class="fas fa-cogs"></i></a></li>
                <li title="Si Amet"><a href="" alt=""><i class="fas fa-book"></i></a></li>
            </ul>
        </nav>

        <nav id="lr-menu">
            <div class="lr-menu-icon"></div>
            <a href="#" id="lr-menu-title">MVCLite</a>
            <div class="lr-logo">
                <a href="/" title="Home">
                    <img src="" alt="MVCLite Logo"/>
                    <h1>{{ application_name }}</h1>
                </a>
            </div>
            <?php
                if ($auth) {
            ?>
            <ul class="lr-right">
                <li title="Log out" class="lr-register">
                    <a href="/user/logout">Log out</a>
                </li>
            </ul>
            <?php
                } else {
            ?>
            <ul class="lr-right">
                <li title="Log in">
                    <a href="/">Log in</a>
                </li>
                <li title="Register" class="lr-register">
                    <a href="/user/signup">Register</a>
                </li>
            </ul>
            <?php
                }
            ?>
        </nav>

        <div>
        {{ body }}
        <div>

        <hr />
        <footer class="lr-row lr-s12">
            <div id="footer" class="lr-full">
                <p><span style="display: inline-block; transform: rotate(180deg);">&copy;</span>Copyleft 2020 (Licence GPL 3.0). {{ application_name }}</p>
            </div>
        </footer>
        <script src='/asset/js/vendor/jquery.min.js'></script>
        <script src='/asset/js/vendor/jquery-ui.min.js'></script>
        <script src='/asset/js/vendor/jquery-confirm.js'></script>
        <script src='/asset/js/app.js'></script>
    </body>
</html>
