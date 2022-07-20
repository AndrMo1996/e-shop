@extends('master',['categories'])

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs-list">
                <a class="breadcrumbs-list__item" href={{ route('index') }}>
                    Головна
                </a>
                <span class="breadcrumbs-list__item">
                    {{ $category->name }}
                </span>
            </ul>
        </div>
    </div>

    @if(count($category->products) > 0)
    <div class="products">
        <div class="container">
            <div class="products__inner">
                <h1 class="products-title">{{ $category->name }}</h1>
                <div class="products-list">
                    @foreach($category->products as $product)
                        @include('card', ['product'])
                    @endforeach
                </div>
            </div>

            <div class="pagination">
                <ul class="pagination-list">
                    <li class="pagination-list__item active">
                         <a href="#">1</a>
                    </li>
                    <li class="pagination-list__item">
                        <a href="#">2</a>
                    </li>
                    <li class="pagination-list__item">
                        <a href="#">3</a>
                    </li>
                    <li class="pagination-list__item">
                        <a href="#">...</a>
                    </li>
                    <li class="pagination-list__item">
                        <a href="#">10</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @else
        <div class="no-products">
            <div class="container">
                <h3 class="no-products__text">
                    В категорії "{{ $category->name }}" немає товарів
                </h3>
            </div>
        </div>
    @endif
@endsection
