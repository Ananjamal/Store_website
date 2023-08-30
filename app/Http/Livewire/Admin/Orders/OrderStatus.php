<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderStatus extends Component
{
    public $order;

    public $orderStatus;

    public function mount($order)
    {
        $this->order = Order::findOrFail($order);
        $this->orderStatus = $this->order->order_status;


        // $initialState = Order::all();
        // foreach ($initialState as $order) {
        //     $order->order_status; // Read the order status (no need to set it here)
        // }

        // Now you can set the initial status for the current $this->order
    }


    public function updateOrderStatus()
    {

        $this->order->order_status = $this->orderStatus;
        $this->order->save();
        // $this->emit('update-status');
        session()->flash('done', 'Success');

    }
    public function render()
    {
        return view('livewire.admin.orders.order-status')->layout('layouts.admin.app');;
    }
}
