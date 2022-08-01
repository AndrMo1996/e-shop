@extends('layouts.master', ['categories'])

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs-list">
                <a class="breadcrumbs-list__item" href={{ route('index') }}>
                    Головна
                </a>
                <a class="breadcrumbs-list__item" href={{ route('category', $product->category->code) }}>
                    {{ $product->category->name }}
                </a>
                <span class="breadcrumbs-list__item">
                    {{ $product->name }}
                </span>
            </ul>
        </div>
    </div>

    <div class="product-card">
        <div class="container">
            <div class="product-card__inner">
                <div class="product-card__img-box">
                    <img class="product-card__img" src={{ $product->image }}>
                </div>
                <div class="product-card__content">
                    <h1 class="product-card__title">{{ $product->name }}</h1>
                    <p class="product-card__code">Код товару: {{ $product->code }}</p>
                    <p class="product-card__price">Ціна: {{ $product->price }} грн</p>
                    <div class="product-card__actions">
                        <a class="product-card__favorite">
                            <img class="product-card__favorite_img" src="/assets/img/favorite.svg">
                        </a>
                        <a class="product-card__rate">
                            <img class="product-card__rate_img" src="/assets/img/rate.svg">
                        </a>
                        <div class="rate-yo" data-rateyo-rating="4">

                        </div>
                    </div>
                    <div class="product-card__characteristics">
                        <h3 class="product-card__characteristics_title">Характеристики:</h3>
                        <ul class="product-card__characteristics_list">
                            @foreach($category->attributes as $attribute)
                                <li class="product-card__characteristics-item">
                                    <div class="product-card__characteristic-name">
                                        {{ $attribute->title }}
                                    </div>
                                    <div class="product-card__characteristic-value">
                                        {{ $product->getAttributeValueById($attribute->id) }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <button class="product-card__btn">Купити</button>
                </div>
            </div>
        </div>
    </div>
@endsection
