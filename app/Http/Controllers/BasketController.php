<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Services\NovaPoshta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket(){
        $order = (new Basket())->getOrder();
        return view('basket', compact('order'));
    }

    public function order(){
        $order = (new Basket())->getOrder();
        $npAreas = NovaPoshta::getAreas();
        return view('order', compact('order', 'npAreas'));
    }

    public function confirmOrder(Request $request){
        $result = (new Basket())->saveOrder($request->name, $request->phone, $request->email);
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
        $result = (new Basket(true))->addProduct($product);
        if ($result) {
            session()->flash('success', __('app.basket.added') . $product->name);
        } else {
            session()->flash('error', __('app.basket.not_available_more') . $product->name);
        }
        return redirect()->back();
    }
}
