<?php

namespace App\Http\Livewire\Website\Cart;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Carts extends Component
{
    public $items = [];
    public $carts;
    public $sub_total;
    public $total;
    public $product_id;
    public $shipping = 10;


    protected $listeners = [
        'refreshpage' => 'refreshpage',
    ];

    public function mount()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $userId = $user->id;

            $this->carts = Cart::where('user_id', $userId)->get();
            $this->items = $this->carts->toArray();

            $this->calculateTotalPrice();

            // foreach ($this->carts as $item) {
            //     $this->quantity[$item->product_id] = $item->quantity;
            // }
        } else {
            $deviceId = session()->getId();

            $this->carts = Cart::where('device_id', $deviceId)->get();
            $this->items = $this->carts->toArray();
            // dd($this->items);

            $this->calculateTotalPrice();
        }
    }

    public function delete_product($id)
    {
        $this->product_id = $id;
    }

    // *////////////////////////////////
    public function increaseQuantity($key)
    {
        $this->items[$key]['quantity'] = $this->items[$key]['quantity'] + 1;
        $this->calculateTotalPrice();
        // $this->updatedQuantity($id);
        $this->updatedQuantity();
    }

    public function decreaseQuantity($key)
    {
        if ($this->items[$key]['quantity'] > 1) {
            $this->items[$key]['quantity'] = $this->items[$key]['quantity'] - 1;
            $this->calculateTotalPrice();
            // $this->updatedQuantity($id);
            $this->updatedQuantity();
        }
    }

    public function updatedQuantity()
    {
        // $cart = Cart::where('product_id', $id)->first();
        // if ($cart) {
        //     $cart->quantity = $this->quantity[$id];
        //     $cart->save();
        // }
        // $this->calculateTotalPrice();
        foreach ($this->items as $key => $item) {
            $cartItem = Cart::find($item['id']); // Assuming you have an 'id' field for each cart item
            if ($cartItem) {
                $cartItem->quantity = $item['quantity'];
                $cartItem->total = $item['quantity'] * $item['price'];

                $cartItem->save();
            }
        }
    }

    private function calculateTotalPrice()
    {
        $this->sub_total = 0;

        foreach ($this->items as $item) {
            $this->sub_total += $item['quantity'] * $item['price'];
        }

        $this->total = $this->sub_total + $this->shipping;
    }

    //////////////////////////////////

    public function refreshpage()
    {
        session()->flash('success', 'Product deleted from cart successfully.');
    }

    public function render()
    {
        return view('livewire.website.cart.carts')->layout('layouts.frontEnd.app');
    }
}
