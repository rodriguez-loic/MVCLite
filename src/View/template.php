<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ title }}</title>
        <link rel="manifest" href="/manifest.json">
        <meta name="application-name" content="{{ application_name }}"/>
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="initial-scale=1">

        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

        <link href="/asset/css/normalize-3.0.3.css" rel="stylesheet">

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
        <div id="lr-banner">
            <div class="lr-row">
                <h1 class="lr-title">{{ header }}</h1>
            </div>  
        </div>
        <hr />
        
        <div>
        {{ body }}
        <div>
     
        <hr />
        <footer class="lr-row lr-s12">
            <div id="footer" class="lr-full">
                <p><span style="display: inline-block; transform: rotate(180deg);">&copy;</span>Copyleft 2020 (Licence GPL 3.0). {{ application_name }}</p>
            </div>
        </footer>
    </body>
</html>