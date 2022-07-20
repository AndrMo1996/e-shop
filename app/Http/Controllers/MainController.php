<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Product::get();
        $categories = Category::get();
        return view('home', compact('categories', 'products'));
    }

    public function category($categoryCode){
        $categories = Category::get();
        $category = Category::where('code', $categoryCode)->first();
//        dd($category->attributes);
        return view('catalog', compact('category', 'categories'));
    }

    public function product($categoryCode, $productCode){
        $categories = Category::get();
        $product = Product::where('code', $productCode)->first();
//                dd($product->attributes);
        return view('product', compact('categories', 'product'));
    }

}
