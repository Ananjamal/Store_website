<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Favorite;
use Livewire\WithPagination;

class Home extends Component
{
    public $user_id;
    public $device_id;
    public $categories;
    // public $products;
    use WithPagination;


    public function mount()
    {
        if (auth()->check()) {
            $this->user_id = auth()->id();
        }else{
           $this->device_id = session()->getId();
        }

        $this->categories = Category::all();
        // $this->products = Product::all();


    }

    public function render()
    {

        return view('livewire.website.home',[
            'products' => Product::paginate(3),
        ])->layout('layouts.frontEnd.app');
    }
}
