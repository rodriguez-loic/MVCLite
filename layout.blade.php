<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>LittleRedCMS - @yeld('title')</title>
        <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon-2/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon-2/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon-2/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon-2/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon-2/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon-2/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon-2/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon-2/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon-2/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/img/favicon-2/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-2/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-2/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-2/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/img/favicon-2/mstile-144x144.png" />
        <meta name="application-name" content="Little Red"/>
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="initial-scale=1">

        {!! HTML::style('//fonts.googleapis.com/css?family=Source+Sans+Pro') !!}
        {!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') !!}
        {!! HTML::style('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') !!}

        {!! HTML::style('css/normalize-3.0.3.css') !!}

        {!! HTML::style('css/app.css') !!}
        {!! HTML::style('css/app-grid.css') !!}
        {!! HTML::style('css/app-menu.css') !!}
        {!! HTML::style('css/app-menu-left.css') !!}
        {!! HTML::style('css/app-menu-round.css') !!}
        {!! HTML::style('css/app-banner.css') !!}
        {!! HTML::style('css/app-form.css') !!}
        {!! HTML::style('css/app-colors.css') !!}
    </head>
    <body>
        @yield('menu-round')

        <nav id="lr-menu">
            <div class="lr-menu-icon"></div>
            <a href="#" id="lr-menu-title">LittleRedCMS</a>
            <div class="lr-logo">
                <a href="/" title="Get me home">
                    <img src="/img/little-red.png" alt="LittleRedCMS Logo"/>
                    <h1>LittleRed CMS</h1>
                </a>
            </div>
            <ul class="lr-left">
                <li title="CSS Documentation" @if(Request::is('css/documentation')) class="lr-active" @endif>
                    {!! HTML::link('/css/documentation', 'CSS Documentation', null, true) !!}
                </li>
            </ul>
            <ul class="lr-right">
                <li title="Log in">
                    {!! HTML::link('', 'Log in', null, true) !!}
                </li>
                <li title="Register" class="lr-register">
                    {!! HTML::link('', 'Create an account', null, true) !!}
                </li>
            </ul>
        </nav>

        @yield('container')

<!--
        <div id="lr-banner">
            <div class="lr-row">
                <div class="lr-s4 lr-ms5 lr-col">
                    <img class="lr-logo" src="/img/little-red.png" alt="Image example"/>
                    <h1 class="lr-title">Little Red CMS</h1>
                </div>
                <form class="lr-form">
                    <div class="lr-s1 lr-o4 lr-ms2 lr-mo0 lr-uncol">
                        {!! Form::text('username', 'Username', array('placeholder' => 'Username', 'id' => 'username', 'class' => 'lr-c-white')) !!}
                        <!-- {!! Form::label('username', 'Username', array('class' => 'lr-c-white')) !!} ->
                    </div>
                    <div class="lr-s1 lr-ms2 lr-uncol">
                        {!! Form::password('password', array('placeholder' => 'Password', 'value' => '', 'id' => 'password', 'class' => 'lr-c-white')) !!}
                        <!-- {!! Form::label('password', 'Password', array('class' => 'lr-c-white')) !!} ->
                    </div>
                    <div class="lr-s2 lr-ms3 lr-uncol">
                        {!! Form::button('Login', array('class' => 'lr-btn primary lr-bc-white')) !!}
                    </div>
                </form>
            </div>
        </div>
-->

        {!! HTML::script('js/vendor/jquery.min.js') !!}
        {!! HTML::script('//code.jquery.com/ui/1.11.4/jquery-ui.js') !!}
        {!! HTML::script('js/app.js') !!}
    </body>
</html>
