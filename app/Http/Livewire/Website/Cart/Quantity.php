<?php

namespace App\Http\Livewire\Website\Cart;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Quantity extends Component
{

    public $quantity;
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
        $cart = Cart::where('product_id', $this->productId)->first();

        $this->quantity = $cart->quantity; // Set initial status
// dd($this->quantity);

    }

    public function increaseQuantity()
    {
        $this->quantity++;
        $this->updatedQuantity();

    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->updatedQuantity();

        }
    }

    public function updatedQuantity()
    {
        // Update the quantity in the database here (using Eloquent or other methods)
        // For example:
        $cart = Cart::where('product_id', $this->productId)->first();

        if ($cart) {
            $cart->quantity = $this->quantity;
            $cart->save();
            // session()->flash('done', 'Success');
            // $this->emit('updatequantity');
        }
    }

    public function render()
    {
        return view('livewire.website.cart.quantity')->layout('layouts.frontEnd.app');
    }
}
