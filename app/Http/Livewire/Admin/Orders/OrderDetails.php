<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderProduct;

class OrderDetails extends Component
{
    public $orderProducts;
    public function mount($id){
        $order =order::findorfail($id);
        $this->orderProducts =OrderProduct::where('order_id', $id)->get();


    }
    public function render()
    {
        return view('livewire.admin.orders.order-details')->layout('layouts.admin.app');
    }
}
