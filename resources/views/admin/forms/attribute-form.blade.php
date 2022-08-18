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
                    @isset($attribute)
                        @method('PUT')
                    @endisset

                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}" />
                    <label for="title">
                        <span>Name
                            <span class="required">*</span>
                        </span>
                        <div class="input-field__inner">
                        <input class="input-field" type="text" name="title" value="{{ old('title', isset($attribute) ? $attribute->title : null) }}" />
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
                            <input class="input-field" type="text" name="code" value="{{ old('code', isset($attribute) ? $attribute->code : null) }}" />
                            @error('code')
                                <div class="alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    <label for="description">
                        <span>Description</span>
                        <div class="input-field__inner">
                            <textarea name="description" class="textarea-field">{{ old('description', isset($attribute) ? $attribute->description : null) }}</textarea>
                            @error('description')
                                <div class="alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    <label><span> </span><input type="submit" value="Save" /></label>
                </form>
            </div>
        </div>
    </div>
@endsection
