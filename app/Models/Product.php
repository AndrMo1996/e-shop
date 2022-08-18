<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
        'category_id',
        'count',
        'price'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class)->withPivot('value')->withTimestamps();
    }

    public function scopeByCode($query, $code){
        return $query->where('code', $code);
    }

    public function scopeByCategory($query, $categoryId){
        return $query->where('category_id', $categoryId);
    }

    public function isAvailable(){
        return $this->count > 0;
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
        return 25;
        if(!is_null($this->pivot->count)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
