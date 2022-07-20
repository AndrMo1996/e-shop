@extends('master', ['categories'])

@section('content')
    @include('banner')

    @if(count($products) > 0)
        <div class="popular-products__section">
            <div class="container">
                <h2 class="popular-products__title">Популярні товари</h2>
                <div class="popular-products__slider">
                    @foreach($products as $product)
                        @include('card', ['product'])
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="about-info">
        <div class="container">
            <div class="about-info__inner">
                <h2 class="about-info__title">Купити радіодеталі в Україні</h2>

                <p>
                    Крамниця радіоелектроніки К206 пропонує електронні компоненти провідних світових виробників.
                    <br>
                    <br>
                    Електронні компоненти, що поставляються нашою компанією, відрізняються високою якістю та надійністю, продукція наших постачальників пройшла випробування часом.
                    <br>
                    У нас прямі постачальники-експортери з країн Європи та Азії, що суттєво знижує вартість продукції для кінцевого споживача.
                    <br>
                    За відсутності в магазині потрібної продукції наші фахівці готові здійснити пошук електронних компонентів і в найкоротші терміни доставити продукцію.
                    <br>
                    Ціни на радіодеталі приємно здивують Вас своєю доступністю.
                    <br>
                    <br>
                    У нашому колективі працюють компетентні продавці-консультанти, які не залишать Вас поза увагою.
                </p>
            </div>
        </div>

    </div>
@endsection
