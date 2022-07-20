<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Інтернет-магазин</title>
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
    </head>

    <body>

        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="left-bar">
                        <div class="logo">
                            <img class="logo__img" src="assets/img/logo.png">
                            <h2 class="logo__text">Radio-Shop</h2>
                        </div>
                        <ul class="navigation-bar">
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
        <section class="banner-section">
            <div class="container">
                <div class="banner-slider">
                    <div class="banner-slider__item">
                        <img class="banner-slider__img" src="/assets/img/banner-1.jpg">
                    </div>
                    <div class="banner-slider__item">
                        <img class="banner-slider__img" src="/assets/img/banner-2.jpg">
                    </div>
                    <div class="banner-slider__item">
                        <img class="banner-slider__img" src="/assets/img/banner-3.jpg">
                    </div>
                </div>
            </div>
        </section>
{{--        <div class="frontBenefits">--}}
{{--            <div class="container">--}}
{{--                <div class="frontBenefits-container">--}}
{{--                    <ul class="frontBenefits-bg">--}}
{{--                        <li class="frontBenefits-block">--}}
{{--                            <div class="frontBenefits-block-w">--}}
{{--                                <div class="frontBenefits-icon ">--}}
{{--                                    <img alt="Оплата при отриманні" class="frontBenefits-icon-img" width="90" height="90" src="/assets/img/26140752058368.webp">--}}
{{--                                </div>--}}
{{--                                <div class="frontBenefits-txt">--}}
{{--                                    <div class="frontBenefits-txt-h">Оплата <br> при отриманні</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="frontBenefits-block">--}}
{{--                            <div class="frontBenefits-block-w">--}}
{{--                                <div class="frontBenefits-icon ">--}}
{{--                                    <img alt="Обмін та повернення" class="frontBenefits-icon-img" width="90" height="90" src="/assets/img/31120744909732.webp">--}}
{{--                                </div>--}}
{{--                                <div class="frontBenefits-txt">--}}
{{--                                    <div class="frontBenefits-txt-h">Обмін <br>та повернення</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="frontBenefits-block">--}}
{{--                            <div class="frontBenefits-block-w">--}}
{{--                                <div class="frontBenefits-icon ">--}}
{{--                                    <img alt="Швидка доставка" class="frontBenefits-icon-img" width="90" height="90" src="/assets/img/80160085259577.webp">--}}
{{--                                </div>--}}
{{--                                <div class="frontBenefits-txt">--}}
{{--                                    <div class="frontBenefits-txt-h">Швидка <br>доставка</div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="frontBenefits-block">--}}
{{--                            <div class="frontBenefits-block-w">--}}
{{--                                <div class="frontBenefits-icon ">--}}
{{--                                    <img alt="Гарантія якості" class="frontBenefits-icon-img" width="90" height="90" src="/assets/img/21150611745060.webp">--}}
{{--                                </div>--}}
{{--                                <div class="frontBenefits-txt">--}}
{{--                                    <div class="frontBenefits-txt-h">Гарантія<br>якості</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="popular-products__section">
            <div class="container">
                <h2 class="popular-products__title">Популярні товари</h2>
                <div class="popular-products__slider">
                    @foreach($products as $product)
                        <div class="product-item__wrapper">
                            <button class="product-item__favorite"></button>
                            <a class="product-item" href="#">
                                <p class="product-item__hover-text">переглянути продукт</p>
                                <img class="product-item__img" src="/assets/img/content/product-1.png">
                                <h4 class="product-item__title">
                                    {{ $product->name }}
                                </h4>
                                <p class="product-item__price">
                                    {{ $product->price }} грн.
                                </p>
                            </a>
                            <button class="product-item__basket"></button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="products">
            <div class="container">
                <div class="products__inner">
                    <h3 class="products-title">Товари</h3>
                    <div class="products-list">
                        @foreach($products as $product)
                        <div class="product-item__wrapper">
                            <button class="product-item__favorite"></button>
                            <a class="product-item" href="#">
                                <p class="product-item__hover-text">переглянути продукт</p>
                                <img class="product-item__img" src="/assets/img/content/product-1.png">
                                <h4 class="product-item__title">
                                    {{ $product->name }}
                                </h4>
                                <p class="product-item__price">
                                    {{ $product->price }} грн.
                                </p>
                            </a>
                            <button class="product-item__basket"></button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="/js/slick.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
    </body>
</html>
