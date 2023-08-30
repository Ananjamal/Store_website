<?php

namespace App\Http\Livewire\Website\Orders;

use Livewire\Component;
use App\Models\OrderProduct;
class OrderDetails extends Component
{
    public $orderdetails;

    public function mount($id){
        $this->orderdetails = OrderProduct::where('order_id',$id)->get();
    }
    public function render()
    {
        return view('livewire.website.orders.order-details')->layout('layouts.frontEnd.app');
    }
}
