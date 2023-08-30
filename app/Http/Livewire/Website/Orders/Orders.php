<?php

namespace App\Http\Livewire\Website\Orders;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public $orders;
    public $user_id;
    public $cancelorder;
    public $result = "canceled";

    public function mount(){
        $this->user_id = auth()->id();

        $this->orders = Order::where('user_id',$this->user_id )->get();
        // dd($this->orders);


    }
    public function cancelOrder($id){
        $this->cancelorder = Order::findOrFail($id);

        $this->cancelorder->order_status = $this->result;
        // dd($this->cancelorder->order_status);
        $this->cancelorder->save();
        // $this->emit('update-status');
        session()->flash('success', 'Order Canceled Successfully ');

    }



    public function render()
    {
        return view('livewire.website.orders.orders')->layout('layouts.frontEnd.app');
    }
}
