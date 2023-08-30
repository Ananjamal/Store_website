<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'device_id', 'product_id', 'product_name', 'quantity', 'price', 'total', 'image']; // Add 'name' to this array

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getImageAttribute($value)
    {
        return url('storage/' . $value);
    }
}
