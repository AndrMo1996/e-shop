<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket(){
//        $categories = Category::get();
        $order = (new Basket())->getOrder();
        return view('basket', compact('order'));
    }

    public function order(){
        $categories = Category::get();

        $order = (new Basket())->getOrder();
        return view('order', compact('categories', 'order'));
    }

    public function confirmOrder(Request $request){
        $order = (new Basket())->getOrder();
        $result = $order->saveOrder($request->name, $request->phone);
        if ($result){
            session()->flash('success', 'Замовлення на опрацюванні. Незабаром ми звяжемось з вами');
        } else{
            session()->flash('error', 'Помилка');
        }
        return redirect()->route('basket');
    }

    public function removeProduct(Product $product){
        (new Basket())->removeProduct($product);
        return redirect()->route('basket');
    }

    public function addProduct(Product $product){
        (new Basket(true))->addProduct($product);
        return back();
    }
}
