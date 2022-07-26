<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Інтернет-магазин</title>
        <link href="/css/reset.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/login.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
                            <li class="navigation-bar__item categories">{{ __('app.main.catalog') }}
                                <ul class="categories-list">
                                    @isset($categories)
                                        @foreach($categories as $category)
                                            <li class="categories-list__item">
                                                <a href={{ route('category', $category->code) }}>
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endisset
                                </ul>
                            </li>
                            <li class="navigation-bar__item">
                                <a class="navigation-bar__link" href="#">{{ __('app.main.buy') }}</a>
                            </li>
                            <li class="navigation-bar__item">
                                <a class="navigation-bar__link" href="#">{{ __('app.main.payment') }}</a>
                            </li>
                            <li class="navigation-bar__item">
                                <a class="navigation-bar__link" href="#">{{ __('app.main.delivery') }}</a>
                            </li>
                            <li class="navigation-bar__item">
                                <a class="navigation-bar__link" href="#">{{ __('app.main.contacts') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="right-bar">
                    <ul class="user-bar">
                        <li class="user-bar__item locale">
                            @if(!empty(App::getLocale()))
                                <img class="user-bar__img-lang" src="/assets/img/lang/{{ App::getLocale() }}.png">
                            @endif
                            <ul class="locale-list">
                                @foreach(Config::get('app.languages') as $lang)
                                    @if($lang !== App::getLocale())
                                        <li class="locale-list__item">
                                            <a class="locale-list__link" href="{{ route('change.locale', $lang) }}">
                                                <img class="user-bar__img-lang" src="/assets/img/lang/{{ $lang }}.png">
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>

                        <li class="userbar__item">
                            <a class="user-bar__link" href="#">
                                <img class="user-bar__img" src="/assets/img/heart.svg">
                            </a>
                        </li>
                            @guest
                                <li class="user-bar__item">
                                <a class="user-bar__link" href="{{ route('login') }}">
                                    <img class="user-bar__img" src="/assets/img/user.svg">
                                </a>
                            @endguest

                            @auth
                             <li class="user-bar__item user">
                                @strfirst(auth()->user()->name)
                                <ul class="person-list">
                                    <li class="person-list__item">
                                        <a class="person-list__link" href="{{ route('logout') }}">
                                            Профіль
                                        </a>
                                    </li>
                                    <li class="person-list__item">
                                        <a class="person-list__link" href="{{ route('logout') }}">
                                            Мої замовлення
                                        </a>
                                    </li>
                                    <li class="person-list__item">
                                        <a class="person-list__link" href="{{ route('logout') }}">
                                            Вийти
                                        </a>
                                    </li>
                                </ul>
                            @endauth
                        </li>
                        <li class="user-bar__item">
                            <a class="user-bar__link basket" href={{ route('basket') }}>
                                <img class="user-bar__img" src="/assets/img/basket.svg">
                                @if(session()->has('order') && session('order')->products->count() > 0)
                                    <p class="basket-count">{{ session('order')->products->count() }}</p>
                                @endif
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
                            <button type="submit">{{ __('app.main.subscribe_btn') }}</button>
                        </form>
                    </div>
                    <div class="footer-item">
                        <h4 class="footer-item__title">{{ __('app.main.info') }}</h4>
                        <ul class="footer-list">
                            <li class="footer-list__item"><a href="#">{{ __('app.main.about') }}</a></li>
                            <li class="footer-list__item"><a href="#">{{ __('app.main.actions') }}</a></li>
                            <li class="footer-list__item"><a href="#">{{ __('app.main.contacts') }}</a></li>
                        </ul>
                    </div>
                    <div class="footer-item">
                        <h4 class="footer-item__title">{{ __('app.main.i_shop') }}</h4>
                        <ul class="footer-list">
                            <li class="footer-list__item"><a href="#">{{ __('app.main.delivery') }}</a></li>
                            <li class="footer-list__item"><a href="#">{{ __('app.main.payment') }}</a></li>
                            <li class="footer-list__item"><a href="#">{{ __('app.main.returns') }}</a></li>
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
        <script type="text/javascript" src="/js/novaPoshta.js"></script>
    </body>
</html>
