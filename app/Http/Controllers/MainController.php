<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $categories = Category::get();
        session(['categories' => $categories]);
        $products = Product::paginate(6);
        return view('home', compact('categories', 'products'));
    }

    public function category($categoryCode){
        $category = Category::where('code', $categoryCode)->first();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('catalog', compact('category', 'products'));
    }

    public function product(Category $category, $productCode){
        $categories = Category::get();
        $product = Product::where('code', $productCode)->first();
        return view('product', compact('category', 'product'));
    }

}
