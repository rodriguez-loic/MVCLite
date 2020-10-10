<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ title }}</title>

        <meta name="application-name" content="{{ application_name }}"/>
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
    <body class="lr-bc-green-A200">

        <div style="height: 95vh;">
        {{ body }}
        </div>

        <footer style="height: 5vh;">
            <div id="footer" style="width: 100%">
                <p><span style="display: inline-block; transform: rotate(180deg);">&copy;</span>Copyleft 2020 (Licence GPL 3.0). {{ application_name }}</p>
            </div>
        </footer>
        <script src='/asset/js/vendor/jquery.min.js'></script>
        <script src='/asset/js/vendor/jquery-ui.min.js'></script>
        <script src='/asset/js/vendor/jquery-confirm.js'></script>
        <script src='/asset/js/app.js'></script>
    </body>
</html>
