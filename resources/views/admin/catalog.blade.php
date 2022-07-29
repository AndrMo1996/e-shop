@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="title">
            <h2 class="title-text">Каталог</h2>
            <div class="title-actions">
                <a class="title-actions__btn" href="{{ route('category.create') }}">Add Category</a>
            </div>
        </div>
        <div class="content__inner">
            @include('admin.tables.categories', ['category'])
        </div>
    </div>
@endsection
