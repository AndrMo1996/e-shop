<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class)->withPivot('value')->withTimestamps();
    }

    public function getAttributeValueById($attributeId){
        $value = '';

        $attribute = $this->attributes()->where('attribute_id', $attributeId)->first();
        if ($attribute){
            $value = $attribute->pivot->value;
        }

        return $value;
    }

    public function countTotalPrice(){
        if(!is_null($this->pivot->count)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
