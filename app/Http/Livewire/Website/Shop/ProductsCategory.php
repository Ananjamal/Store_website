<?php

namespace App\Http\Livewire\Website\Shop;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Favorite;

class ProductsCategory extends Component
{



    public $user_id; // Corrected property name
    public $device_id; // Corrected property name

    public $categories; // Corrected property name
    public $products; // Corrected property name

    public function mount($id)
    {
        if (auth()->check()) {
            $this->user_id = auth()->id();
        } else {
            $this->device_id = session()->getId();
        }

        $this->categories = Category::all();

        $this->products = Product::where('category_id', $id)->get();
        // dd($this->products);
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
            $this->emit('refreshCount');
        }
    }
    public function addtofavorite($productId)
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
            $existingItem = Favorite::where('user_id', $this->user_id)
                ->where('product_id', $product->id) // Change this line
                ->first();
        } elseif ($this->device_id) {
            $existingItem = Favorite::where('device_id', $this->device_id)
                ->where('product_id', $product->id) // Change this line
                ->first();
        }

        if ($existingItem) {
            // Display a flash message if the product is already in favorites
            session()->flash('error', 'Product is already in your favorites.');
        } else {
            // Product is not in the favorites, so add it
            Favorite::create([
                'user_id' => $this->user_id,
                'device_id' => $this->device_id,
                'product_id' => $product->id,
            ]);

            session()->flash('success', 'Product added to favorites successfully.');
            $this->emit('refreshCount');
            // $this->emit('refreshpage');


        }
    }



    public function render()
    {
        return view('livewire.website.shop.products-category')->layout('layouts.frontEnd.app');
    }
}
