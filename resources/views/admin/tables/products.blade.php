<ul class="table">
    <li class="table-row header">
        <div class="product__id">#</div>
        <div class="product__code">Code</div>
        <div class="product__name">Name</div>
        <div class="product__description">Description</div>
        <div class="product__price">Price</div>
        <div class="table__actions">Actions</div>
    </li>
    @foreach($category->products as $product)
        <li class="table-row">
            <div class="product__id">
                {{ $product->id }}
            </div>
            <div class="product__code">
                {{ $product->code }}
            </div>
            <div class="product__name">
                <a class="category__link" href="">
                    {{ $product->name }}
                </a>
            </div>
            <div class="product__description">
                {{ $product->description }}
            </div>
            <div class="product__price">
                {{ $product->price }}
            </div>
            <div class="table-col table__actions">
                <a class="action-form__item" href="{{ route('product.edit', [$category, $product]) }}">
                    <img class="action__img" src="/assets/img/edit.svg">
                </a>
                <form class="table__actions-form" action="{{ route('product.destroy', $product) }}" method="POST">
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
