<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index(){
        $products = Product::with('category')->paginate(6);
        return view('home', compact( 'products'));
    }

    public function category($categoryCode){
        $category = Category::byCode($categoryCode)->firstOrFail();
        $products = Product::with('category')->byCategory($category->id)->paginate(12);
        return view('catalog', compact('category', 'products'));
    }

    public function product(Category $category, $productCode){
        $product = Product::byCode($productCode)->first();
        return view('product', compact('category', 'product'));
    }

    public function changeLocale($locale){
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

}
