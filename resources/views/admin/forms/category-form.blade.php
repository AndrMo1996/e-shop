@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="title">
            <h2 class="title-text">
                @isset($category)
                    Edit: {{ $category->name }}
                @else
                    New category
                @endisset
            </h2>
        </div>
        <div class="content__inner">
            <div class="form">
                <div class="form-heading">Provide your information</div>
                <form enctype="multipart/form-data" method="POST"
                    @isset($category)
                      action="{{ route('category.update', [$category, $product]) }}"
                    @else
                      action="{{ route('category.store') }}"
                    @endisset
                >
                    @isset($category)
                        @method('PUT')
                    @endisset
                    @csrf
                    <label for="name">
                        <span>Name
                            <span class="required">*</span>
                        </span>
                        <input class="input-field" type="text" name="name" value="@isset($category){{ $category->name }}@endisset" />
                    </label>

                    <label for="code">
                        <span>Code
                            <span class="required">*</span>
                        </span>
                        <input class="input-field" type="text" name="code" value="@isset($category){{ $category->code }}@endisset" />
                    </label>

                    <label for="description">
                        <span>Description</span>
                        <textarea name="description" class="textarea-field">@isset($category){{ $category->description }}@endisset</textarea>
                    </label>

                    <label><span> </span><input type="submit" value="Save" /></label>
                </form>
            </div>
        </div>
    </div>
@endsection
