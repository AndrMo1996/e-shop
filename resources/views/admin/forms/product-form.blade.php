@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="title">
            <h2 class="title-text">
                @isset($product)
                    Edit: {{ $product->name }}
                @else
                    New product in category: {{ $category->name }}
                @endisset
            </h2>
        </div>
        <div class="content__inner">
            <div class="form">
                <div class="form-heading">Provide your information</div>
                <form enctype="multipart/form-data" method="POST"
                      @isset($product)
                          action="{{ route('product.update', [$category, $product]) }}"
                      @else
                          action="{{ route('product.store', $category) }}"
                    @endisset
                >
                    @isset($product)
                        @method('PUT')
                    @endisset

                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}" />
                    <label for="name">
                        <span>Name
                            <span class="required">*</span>
                        </span>
                        <input class="input-field" type="text" name="name" value="@isset($product){{ $product->name }}@endisset" />
                    </label>

                    <label for="code">
                        <span>Code
                            <span class="required">*</span>
                        </span>
                        <input class="input-field" type="text" name="code" value="@isset($product){{ $product->code }}@endisset" />
                    </label>

                    <label for="description">
                        <span>Description</span>
                        <textarea name="description" class="textarea-field">@isset($product){{ $product->description }}@endisset</textarea>
                    </label>

                    <label for="image">
                        <span>Image</span>
                        <input class="input-field" type="file" name="image" />
                    </label>
                        @foreach($category->attributes as $attribute)
                            <label for="attr_{{ $attribute->id }}">
                                <span>{{ $attribute->title }}</span>
                                <input class="input-field" type="text" name="attr_{{ $attribute->id }}" value="@isset($product){{ $product->getAttributeValueById($attribute->id) }}@endisset"/>
                            </label>
                        @endforeach
{{--                    <label for="image">--}}
{{--                        <span>Image</span>--}}
{{--                        <div class="input-file">--}}
{{--                            <label class="input-file__label">--}}
{{--                                <i class="material-icons">attach_file</i>--}}
{{--                                <span class="input-file__title">Добавить файл</span>--}}
{{--                                <input type="file" name="image">--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </label>--}}
                    <label><span> </span><input type="submit" value="Save" /></label>
                </form>
            </div>
        </div>
    </div>
@endsection
