<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Basket
{
    protected $order;

    /**
     * @param $order
     */
    public function __construct(bool $createOrder = false)
    {
        $this->order = [];
        $orderId = session('orderId');

        if (is_null($orderId) && $createOrder === true) {
            $data = [];

            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }

            $this->order = Order::create($data);
            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::find($orderId);
        }
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function addProduct(Product $product){
        if ($this->order->products->contains($product->id)){
            $pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $this->order->products()->attach($product->id);
        }

        session(['orderProductCount' => $this->order->products()->count()]);

        return back();
    }

    public function removeProduct(Product $product){
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        session(['orderProductCount' => $this->order->products()->count()]);

        return redirect()->route('basket');
    }

}
