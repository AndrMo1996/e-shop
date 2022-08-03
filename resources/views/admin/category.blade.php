@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="title">
            <h2 class="title-text">{{ $category->name }}</h2>
            <div class="title-actions">
                <a class="title-actions__btn" href="{{ route('product.create', $category) }}">Add Product</a>
                <a class="title-actions__btn" href="{{ route('attribute.create', $category) }}">Add Attribute</a>
            </div>
        </div>
        <div class="content__inner">
            <div class="category-content">
                <div class="category-tabs">
                    <a class="category-tabs__item category-tabs__item-active" href="#products">Products</a>
                    <a class="category-tabs__item" href="#attributes">Attributes</a>
                </div>
                <div class="category-content">
                    <div id="products" class="category-content__item category-content__item-active">
                        @include('admin.tables.products', ['product'])
                    </div>
                    <div id="attributes" class="category-content__item">
                        @include('admin.tables.attributes', ['category'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
