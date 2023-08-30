<?php

namespace App\Http\Livewire\Website\Favorite;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Favorite;
use Livewire\WithPagination;

class Favorites extends Component
{
    use WithPagination;
    public $user_id;
    public $device_id;

    public $product_id;
    public $favorites;

    protected $listeners = [
        'refreshpage' => 'refreshpage',
    ];

    public function mount()
    {
        // $this->favorites = Favorite::where('user_id', auth()->user()->id)->get();
        if (auth()->check()) {
            $user = auth()->user();
            $userId = $user->id;
            $this->favorites = Favorite::where('user_id', $userId)->get();
        } else {
            $deviceId = session()->getId();

            $userId = $deviceId;
            // dd($userId);
            $this->favorites = Favorite::where('device_id', $userId)->get();
        }
    }

    public function remove_product($id)
    {
        $this->product_id = $id;
    }

    public function addtocart($productId)
    {
        $product = Product::findOrFail($productId);

        if (auth()->check()) {
            $this->user_id = auth()->id();
        } else {
            $this->device_id = session()->getId();
        }

        $existingItem = null;
        if (auth()->check()) {
            $this->user_id = auth()->id();
            $existingItem = Cart::where('user_id', $this->user_id)
                ->where('product_id', $product->id)
                ->first();
        } elseif ($this->device_id) {
            $existingItem = Cart::where('device_id', $this->device_id)
                ->where('product_id', $product->id)
                ->first();
        }

        if ($existingItem) {
            // Display a flash message if the product is already in the cart
            session()->flash('error', 'Product is already in your cart.');
        } else {
            // Product is not in the cart, so add it
            Cart::create([
                'user_id' => $this->user_id,
                'device_id' => $this->device_id,
                'product_id' => $product->id,
                'quantity' => 1, // You can modify this
                'product_name' => $product->name,
                'price' => $product->price,
                'total' => $product->price,

                'image' => $product->image,
            ]);

            session()->flash('success', 'Product added to cart successfully.');
        }
    }
    public function refreshpage()
    {
        session()->flash('success', 'Product Removed From Favorites Successfully.');
    }

    public function render()
    {
        return view('livewire.website.favorite.favorites')->layout('layouts.frontEnd.app');
    }
}
