@extends('layouts.master',['categories'])

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs-list">
                <a class="breadcrumbs-list__item" href={{ route('index') }}>
                    {{ __('app.main.main') }}
                </a>
                <a class="breadcrumbs-list__item" href={{ route('basket') }}>
                    Корзина
                </a>
                <span class="breadcrumbs-list__item">
                    Оформлення замовлення
                </span>
            </ul>
        </div>
    </div>

    <div class="basket">
        <div class="container">
            <div class="basket__inner">
                <h1 class="basket-title">Оформлення замовлення</h1>
                <div class="order-content">
                    <div class="order_left-side">
                        <form class="order-form" action="{{ route('confirm-order') }}" method="POST">
                            <div class="form-recipient">
                                <p class="form-title">Одержувач</p>
                                <input class="input-field" type="text" name="name" placeholder="Enter first and last name">
                                <input class="input-field" type="text" name="phone" placeholder="Enter phone">
                                <input class="input-field" type="text" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-address">
                                <p class="form-title">Адреса доставки</p>
                                <input class="input-field region active" list="region-list" name="region" placeholder="Enter region">
                                <datalist id="region-list">
                                    @foreach($npAreas as $area)
                                        <option value="{{ $area['Description'] }}" id="{{ $area['Ref'] }}">
                                    @endforeach
                                </datalist>

                                <input class="input-field city" list="city-list" name="city" placeholder="Enter city">
                                <datalist id="city-list" class="city-list"></datalist>

                                <input class="input-field department" list="department-list" name="department" placeholder="Enter department">
                                <datalist id="department-list" class="department-list"></datalist>
                            </div>
                            <button class="order-submit" type="submit">Оформити</button>
                            @csrf
                        </form>
                    </div>
                    <div class="order_right-side">
                        <div class="right-side__title">
                            <h3>Підтвердження</h3>
                            <div class="order-images">
                                <img src="/assets/img/mastercard-secure.svg">
                                <img src="/assets/img/visa-secure.svg">
                            </div>
                        </div>
                        <div class="right-side__body">
                            <p>Кількість товарів: {{ $order->products->count() }}</p>
                            <p>Сума замовлення: {{ $order->countTotalPrice() }}</p>
                        </div>
                        <div class="right-side__total">
                            <h4>Разом: {{ $order->countTotalPrice() }} грн.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
