<ul class="table">
    <li class="table-row header">
        <div class="attribute__id">#</div>
        <div class="attribute__required">Required</div>
        <div class="attribute__name">Name</div>
        <div class="attribute__description">Description</div>
        <div class="table__actions">Actions</div>
    </li>
    @foreach($category->attributes as $attribute)
        <li class="table-row">
            <div class="attribute__id">
                {{ $attribute->id }}
            </div>
            <div class="attribute__required">
                {{ $attribute->code }}
            </div>
            <div class="attribute__name">
                <a class="category__link" href="">
                    {{ $attribute->title }}
                </a>
            </div>
            <div class="attribute__description">
                {{ $attribute->code }}
            </div>
            <div class="table-col table__actions">
                <a class="action-form__item" href="{{ route('category.edit', $category) }}">
                    <img class="action__img" src="/assets/img/edit.svg">
                </a>
                <form class="table__actions-form" action="{{ route('product.destroy', $category) }}" method="POST">
                    @csrf
                    <label class="action-form__item">
                        <img class="action__img" src="/assets/img/delete.svg">
                        @method('DELETE')
                        <input class="input-delete" type="submit">
                    </label>
                </form>
            </div>
        </li>
    @endforeach
</ul>
