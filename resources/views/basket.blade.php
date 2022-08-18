@extends('layouts.master')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            @if(session()->has('success'))
                <div class="alert success">{{ session()->get('success') }}</div>
            @endif
            @if(session()->has('error'))
                <p class="alert error">{{ session()->get('error') }}</p>
            @endif

            <ul class="breadcrumbs-list">
                <a class="breadcrumbs-list__item" href={{ route('index') }}>
                    {{ __('app.main.main') }}
                </a>
                <span class="breadcrumbs-list__item">
                    {{ __('app.main.basket') }}
                </span>
            </ul>
        </div>
    </div>

    <div class="basket">
        <div class="container">
            <div class="basket__inner">
                <h1 class="basket-title">{{ __('app.main.basket_title') }}</h1>
                @if(!empty($order))
                    <div class="basket-total">
                        <div class="basket-total__price">
                            <h3>
                                {{ __('app.main.total') }}:
                            </h3>
                            <h2>
                                {{ $order->countTotalPrice() }} грн
                            </h2>
                        </div>
                        <a class="basket-total__btn" href="{{ route('order') }}">
                            {{ __('app.main.confirm_order_btn') }}
                        </a>
                    </div>

                    <h3 class="basket-list__title">{{ __('app.main.product_list') }}:</h3>
                    <ul class="basket-list">
                        @foreach($order->products as $product)
                            <li class="basket-list__item">
                                <a class="basket-product__title" href={{ route('product', [$product->category->code, $product->code]) }}>
                                    <img src={{ Storage::url($product->image) }}>
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
                                    <span>{{ $product->countInOrder }} шт.</span>
                                </div>
                                <span class="basket-product__total-price">{{ $product->price * $product->countInOrder }} uah</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="no-products">
                        <div class="container">
                            <h3 class="no-products__text">
                                {{ __('app.main.empty_basket') }}
                            </h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
