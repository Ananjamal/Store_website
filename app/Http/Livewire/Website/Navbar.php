<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Favorite;

class Navbar extends Component
{
    public $carts;
    public $favorites;
    protected $listeners = [
        'refreshCount' => 'refreshCount',
    ];

    public function mount()
    {
        // $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        // $this->favorites = Favorite::where('user_id', auth()->user()->id)->get();
        if (auth()->check()) {
            $user = auth()->user();
            $userId = $user->id;
            $this->carts = Cart::where('user_id', $userId)->get()->count();
            // dd($this->carts);
            $this->favorites = Favorite::where('user_id',$userId)->get()->count();


        } else {
            $deviceId = session()->getId();

            $userId = $deviceId;
            // dd($userId);
            $this->carts = Cart::where('device_id', $userId)->get()->count();
            $this->favorites = Favorite::where('device_id',$userId)->get()->count();

        }
    }
    public function refreshCount()
    {
        $this->mount();
    }
    public function render()
    {
        return view('livewire.website.navbar')->layout('layouts.frontEnd.app');
    }
}
