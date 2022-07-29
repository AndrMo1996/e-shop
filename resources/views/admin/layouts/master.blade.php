<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Інтернет-магазин</title>
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <link href="/css/form.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<div class="content">
    <div class="sidebar">
        <div class="logo">
            <h1 class="logo-title">Admin panel</h1>
        </div>
        <ul class="nav-menu">
            <li class="nav-menu__item">
                <a href="#">Dashboard</a>
            </li>
            <li class="nav-menu__item">
                <a href="{{ route('category.index') }}">Catalog</a>
            </li>
            <li class="nav-menu__item">
                <a href="#">Orders</a>
            </li>
        </ul>
    </div>
    <div class="content-body">
        @yield('content')
    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script type="text/javascript" src="/js/slick.min.js"></script>
<script type="text/javascript" src="/js/admin.js"></script>
</body>
</html>
