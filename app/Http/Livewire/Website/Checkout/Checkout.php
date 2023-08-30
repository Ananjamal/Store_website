<?php

namespace App\Http\Livewire\Website\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\UserAddress;
use App\Models\OrderProduct;
use Livewire\Component;

class Checkout extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address_line1;
    public $address_line2;
    public $country;
    public $city;
    public $state;
    public $zip;
    public $paymentMethod;
    public $items = [];
    public $carts;
    public $sub_total;
    public $total;
    public $discount = 5;
    public $shipping = 10;


    public function mount()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        $this->items = $this->carts->toArray();
        $this->calculateTotalPrice();
    }
    public function calculateTotalPrice()
    {
        $total = Cart::where('user_id', auth()->user()->id)->sum('total');
        $this->total = $total + $this->shipping - $this->discount;
    }

    public function placeOrder()
    {
        // dd($this->total);
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'paymentMethod' => 'required',
        ]);

        // Create the order
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->shipping_price = $this->shipping;
        $order->total_price = $this->total;
        $order->payment_method = $this->paymentMethod;
        $order->save();

        // Create the user address
        $userAddress = new UserAddress();
        $userAddress->user_id = auth()->user()->id;
        $userAddress->order_id = $order->id;
        $userAddress->firstname = $this->firstname;
        $userAddress->lastname = $this->lastname;
        $userAddress->email = $this->email;
        $userAddress->phone = $this->phone;
        $userAddress->address_line1 = $this->address_line1;
        $userAddress->address_line2 = $this->address_line2;
        $userAddress->country = $this->country;
        $userAddress->city = $this->city;
        $userAddress->state = $this->state;
        $userAddress->zip_code = $this->zip;
        $userAddress->save();

        // Loop through cart items and create order products
        foreach ($this->carts as $cart) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $cart->product->id;
            $orderProduct->quantity = $cart->quantity; // Assuming quantity per cart item is 1
            $orderProduct->price = $cart->product->price;
            $orderProduct->total = $cart->total;

            $orderProduct->save();
        }
        // Redirect or display success message
        session()->flash('success', 'Your order has been placed successfully.');
        $this->resetInput();
        //Clear the cart after placing the order
        Cart::where('user_id', auth()->user()->id)->delete();
    }
    public function resetInput()
    {
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->phone = null;
        $this->address_line1 = null;
        $this->address_line2 = null;
        $this->country = null;
        $this->city = null;
        $this->state = null;
        $this->zip = null;
        $this->paymentMethod = null;
    }


    public function render()
    {
        return view('livewire.website.checkout.checkout')->layout('layouts.frontEnd.app');
    }
}
