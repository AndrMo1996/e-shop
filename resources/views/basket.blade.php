@extends('layouts.master',['categories'])

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs-list">
                <a class="breadcrumbs-list__item" href={{ route('index') }}>
                    Головна
                </a>
                <span class="breadcrumbs-list__item">
                    Корзина
                </span>
            </ul>
        </div>
    </div>

    <div class="basket">
        <div class="container">
            <div class="basket__inner">
                <h1 class="basket-title">Моя корзина</h1>

                @if(session()->has('success'))
                    <p class="alert success">{{ session()->get('success') }}</p>
                @endif
                @if(session()->has('error'))
                    <p class="alert error">{{ session()->get('error') }}</p>
                @endif

                @if(!empty($order))
                    <div class="basket-total">
                        <div class="basket-total__price">
                            <h3>
                                Всього:
                            </h3>
                            <h2>
                                {{ $order->countTotalPrice() }} грн
                            </h2>
                        </div>
                        <a class="basket-total__btn" href="{{ route('order') }}">
                            Оформити замовлення
                        </a>
                    </div>

                    <h3 class="basket-list__title">Список продуктів:</h3>
                    <ul class="basket-list">
                        @foreach($order->products as $product)
                            <li class="basket-list__item">
                                <a class="basket-product__title" href={{ route('product', [$product->category->code, $product->code]) }}>
                                    <img src={{ $product->image }}>
                                    <span>{{ $product->name }}</span>
                                </a>
                                <span class="basket-product__price"> {{ $product->price }} uah</span>
                                <div class="basket-product__count">
                                    <form action={{ route('basket-remove', $product) }} method="POST">
                                        <button class="basket-product__remove-btn">-</button>
                                        @csrf
                                    </form>

                                    <form action={{ route('basket-add', $product) }} method="POST">
                                        <button class="basket-product__add-btn">+</button>
                                        @csrf
                                    </form>
                                    <span>{{ $product->pivot->count }} шт.</span>
                                </div>
                                <span class="basket-product__total-price"> {{ $product->countTotalPrice() }} uah</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="no-products">
                        <div class="container">
                            <h3 class="no-products__text">
                                У вашій корзині немає товарів
                            </h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
