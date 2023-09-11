<?php

namespace App\Http\Livewire\Api\Post;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public function mount(){
        $products = Product::get();
        $message = ["ok"];
         return response()->json($products, 200, $message);
    }
    public function render()
    {
        return view('livewire.api.post.show')->layout('layouts.api.app');
    }
}
