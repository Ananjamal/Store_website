<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Favorite;

class Home extends Component
{
  

    public function render()
    {
        return view('livewire.website.home')->layout('layouts.frontEnd.app');
    }
}
