@extends('layouts.master',['categories'])

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
                        @foreach($products as $product)
                            @include('layouts.card', ['product'])
                        @endforeach
                    </div>
                </div>

                <div class="pagination">
                    {{ $products->links() }}
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
