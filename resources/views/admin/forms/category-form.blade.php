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
                      action="{{ route('category.update', [$category]) }}"
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
                        <div class="input-field__inner">
                            <input class="input-field" type="text" name="name" value="{{ old('name', isset($category) ? $category->name : null) }}" />
                            @error('name')
                                <div class="alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    <label for="code">
                        <span>Code
                            <span class="required">*</span>
                        </span>
                        <div class="input-field__inner">
                            <input class="input-field" type="text" name="code" value="@isset($category){{ $category->code }}@endisset" />
                            @error('code')
                            <div class="alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    <label for="description">
                        <span>Description</span>
                        <div class="input-field__inner">
                            <textarea name="description" class="textarea-field">@isset($category){{ $category->description }}@endisset</textarea>
                        </div>
                    </label>

                    <label><span> </span><input type="submit" value="Save" /></label>
                </form>
            </div>
        </div>
    </div>
@endsection
