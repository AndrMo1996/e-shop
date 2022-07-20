<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Інтернет-магазин</title>
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="left-bar">
                        <a class="logo" href={{ route('index') }}>
                            <img class="logo__img" src="/assets/img/logo.png">
                            <h2 class="logo__text">Radio-Shop</h2>
                        </a>
                        <ul class="navigation-bar">
                            <li class="navigation-bar__item categories">Каталог
                                <ul class="categories-list">
                                    @foreach($categories as $category)
                                        <li class="categories-list__item">
                                            <a href={{ route('category', $category->code) }}>
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                </ul>
                            </li>
                            <li class="navigation-bar__item">
                                <a class="navigation-bar__link" href="#">Як купити</a>
                            </li>
                            <li class="navigation-bar__item">
                                <a class="navigation-bar__link" href="#">Оплата</a>
                            </li>
                            <li class="navigation-bar__item">
                                <a class="navigation-bar__link" href="#">Доставка</a>
                            </li>
                            <li class="navigation-bar__item">
                                <a class="navigation-bar__link" href="#">Контакти</a>
                            </li>
                        </ul>
                    </div>
                    <div class="right-bar">
                    <ul class="user-bar">
                        <li class="userbar__item">
                            <a class="user-bar__link" href="#">
                                <img class="user-bar__img" src="/assets/img/heart.svg">
                            </a>
                        </li>
                        <li class="user-bar__item">
                            <a class="user-bar__link" href="#">
                                <img class="user-bar__img" src="/assets/img/user.svg">
                            </a>
                        </li>
                        <li class="user-bar__item">
                            <a class="user-bar__link" href="#">
                                <img class="user-bar__img" src="/assets/img/basket.svg">
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </header>

        <div class="content-body">
            @yield('content')
        </div>

        <footer class="footer">
            <div class="container">
                <div class="footer__inner">
                    <div class="footer-item">
                        <h4 class="footer-item__title">Підписатися на розсилку про акції</h4>
                        <form class="footer-form">
                            <input class="footer-form__input" type="text" placeholder="Введіть ваш e-mail">
                            <button type="submit">Підписатися</button>
                        </form>
                    </div>
                    <div class="footer-item">
                        <h4 class="footer-item__title">Інформація</h4>
                        <ul class="footer-list">
                            <li class="footer-list__item"><a href="#">Про компанію</a></li>
                            <li class="footer-list__item"><a href="#">Акції</a></li>
                            <li class="footer-list__item"><a href="#">Контакти</a></li>
                        </ul>
                    </div>
                    <div class="footer-item">
                        <h4 class="footer-item__title">Інтернет-магазин</h4>
                        <ul class="footer-list">
                            <li class="footer-list__item"><a href="#">Доставка</a></li>
                            <li class="footer-list__item"><a href="#">Оплата</a></li>
                            <li class="footer-list__item"><a href="#">Повернення та обмін</a></li>
                        </ul>
                    </div>
                    <div class="footer-item">
                        <ul class="social-list">
                            <li class="social-list__item">
                                <a href="#">
                                    <img class="social-list__img" src="/assets/img/social/instagram.png">
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#">
                                    <img class="social-list__img" src="/assets/img/social/telegram.png">
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#">
                                    <img class="social-list__img" src="/assets/img/social/youtube.png">
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#">
                                    <img class="social-list__img" src="/assets/img/social/twitter.png">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script type="text/javascript" src="/js/slick.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
    </body>
</html>
