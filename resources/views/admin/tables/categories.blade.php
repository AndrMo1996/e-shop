<ul class="table">
    <li class="table-row header">
        <div class="table-col category__id">#</div>
        <div class="table-col category__code">Code</div>
        <div class="table-col category__name">Name</div>
        <div class="table-col category__description">Description</div>
        <div class="table-col category__products-count">К-сть товарів</div>
        <div class="table-col table__actions">Actions</div>
    </li>
    @foreach($categories as $category)
    <li class="table-row">
        <div class="table-col category__id">
            {{ $category->id }}
        </div>
        <div class="table-col category__code">
            {{ $category->code }}
        </div>
        <div class="table-col category__name">
            <a class="category__link" href="{{ route('category.show', $category) }}">
                {{ $category->name }}
            </a>
        </div>
        <div class="table-col category__description">
            {{ $category->description }}
        </div>
        <div class="table-col category__products-count">
            {{ count($category->products) }}
        </div>
        <div class="table-col table__actions">
            <a class="action-form__item" href="{{ route('category.edit', $category) }}">
                <img class="action__img" src="/assets/img/edit.svg">
            </a>
            <form class="table__actions-form" action="{{ route('category.destroy', $category) }}" method="POST">
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
