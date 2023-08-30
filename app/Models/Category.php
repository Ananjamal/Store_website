<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'description']; // Add 'name' to this array


    public function product()
    {
        return $this->hasMany(Product::class);
    }

    // public function getImagePathAttribute()
    // {
    //     return 'storage/' . $this->image;
    // }
    public function getImageAttribute($value)
    {
         return url('storage/' . $value);

    }
}
