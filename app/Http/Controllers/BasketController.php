<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket(){
        $categories = Category::get();
        $order = [];

        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        return view('basket', compact('categories', 'order'));
    }

    public function order(){
        $categories = Category::get();

        $orderId = session('orderId');
        if (is_null($orderId)) {
           return redirect()->route('home');
        }
        $order = Order::findOrFail($orderId);
        return view('order', compact('categories', 'order'));
    }

    public function confirmOrder(Request $request){
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::findOrFail($orderId);
        $result = $order->saveOrder($request->name, $request->phone);
        if ($result){
            session()->flash('success', 'Замовлення на опрацюванні. Незабаром ми звяжемось з вами');
        } else{
            session()->flash('error', 'Помилка');
        }
        return redirect()->route('basket');
    }

    public function removeProduct($productId){
        $orderId = session('orderId');
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $currentProduct = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($currentProduct->count < 2) {
                $order->products()->detach($productId);
            } else {
                $currentProduct->count--;
                $currentProduct->update();
            }
        }

        session(['orderProductCount' => $order->products()->count()]);

        return redirect()->route('basket');
    }

    public function addProduct($productId){
        $orderId = session('orderId');

        if (is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else{
            $order = Order::find($orderId);
        }

        if ($order->products->contains($productId)){
            $currentProduct = $order->products()->where('product_id', $productId)->first()->pivot;
            $currentProduct->count++;
            $currentProduct->update();
        } else {
            $order->products()->attach($productId);
        }

        if (Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }

        session(['orderProductCount' => $order->products()->count()]);

        return back();
    }
}
