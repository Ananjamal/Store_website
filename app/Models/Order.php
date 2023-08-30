<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function orderproduct()
    {
        return $this->hasone(OrderProduct::class);
    }


    public function useraddress()
    {
        return $this->hasOne(UserAddress::class);
    }




    public function getImageAttribute($value)
    {
         return url('storage/' . $value);

    }
}
