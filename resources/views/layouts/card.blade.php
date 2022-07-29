<div class="product-item__wrapper">
    <button class="product-item__favorite"></button>
    <a class="product-item" href={{ route('product', [$product->category->code, $product->code]) }}>
        <p class="product-item__hover-text">переглянути продукт</p>
        <img class="product-item__img" src={{ Storage::url($product->image) }}>
        <h4 class="product-item__title">
            {{ $product->name }}
        </h4><button class="product-item__basket"></button>
        <p class="product-item__price">
            {{ $product->price }} грн.
        </p>
    </a>
    <form action={{ route('basket-add', $product) }} method="POST">
        <button class="product-item__basket" type="submit"></button>
        @csrf
    </form>
</div>
