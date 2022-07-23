@extends('layouts.master',['categories'])

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs-list">
                <a class="breadcrumbs-list__item" href={{ route('index') }}>
                    Головна
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
                <h3>Товарів на суму: {{ $order->countTotalPrice() }} грн.</h3>
                <form action="{{ route('confirm-order') }}" method="POST">
                    <input type="text" name="name" placeholder="Enter name">
                    <input type="text" name="phone" placeholder="Enter phone">
                    <button type="submit">Оформити</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
