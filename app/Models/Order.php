<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\s;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price'
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot(['count', 'price'])->withTimestamps();
    }

    public function countTotalPrice(){
        $sum = 0;

        foreach ($this->products as $product){
            $sum += $product->price * $product->countInOrder;
        }

        return $sum;
    }

    public function saveOrder($name, $phone, $email){
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->total_price = $this->countTotalPrice();
        $this->status = 1;
        $this->save();

        foreach ($this->products as $orderProduct){
            $this->products()->attach($orderProduct, [
                'count' => $orderProduct->countInOrder,
                'price' => $orderProduct->price
            ]);
        }

        session()->forget('order');
        return true;
    }
}
