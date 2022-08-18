<?php

namespace App\ViewComposers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;

class PopularProductsComposer
{
    public function compose(View $view){
        $popularProductsIds = Order::get()->map->products->flatten()->map->pivot->mapToGroups( function($item){
            return [$item->product_id => $item->count];
        })->map->sum()->sortByDesc(null)->take(10)->keys();
        $popularProducts = Product::whereIn('id', $popularProductsIds)->get();
        $view->with('popularProducts', $popularProducts);
    }
}
