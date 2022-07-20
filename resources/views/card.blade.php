<div class="product-item__wrapper">
    <button class="product-item__favorite"></button>
    <a class="product-item" href={{ route('product', [$product->category->code, $product->code]) }}>
        <p class="product-item__hover-text">переглянути продукт</p>
        <img class="product-item__img" src={{ $product->image }}>
        <h4 class="product-item__title">
            {{ $product->name }}
        </h4>
        <p class="product-item__price">
            {{ $product->price }} грн.
        </p>
    </a>
    <button class="product-item__basket"></button>
</div>
