@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="title">
            <h2 class="title-text">
                @isset($attribute)
                    Edit: {{ $attribute->title }}
                @else
                    New attribute in category: {{ $category->name }}
                @endisset
            </h2>
        </div>
        <div class="content__inner">
            <div class="form">
                <div class="form-heading">Provide your information</div>
                <form enctype="multipart/form-data" method="POST"
                      @isset($attribute)
                          action="{{ route('attribute.update', [$category, $attribute]) }}"
                      @else
                          action="{{ route('attribute.store', $category) }}"
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
                        <input class="input-field" type="text" name="title" value="@isset($attribute){{ $attribute->title }}@endisset" />
                    </label>

                    <label for="code">
                        <span>Code
                            <span class="required">*</span>
                        </span>
                        <input class="input-field" type="text" name="code" value="@isset($attribute){{ $attribute->code }}@endisset" />
                    </label>

                    <label for="description">
                        <span>Description</span>
                        <textarea name="description" class="textarea-field">@isset($attribute){{ $attribute->description }}@endisset</textarea>
                    </label>

                    <label><span> </span><input type="submit" value="Save" /></label>
                </form>
            </div>
        </div>
    </div>
@endsection
