<?php

namespace App\Http\Livewire\Website\Slider;

use Livewire\Component;

class Slider extends Component
{
    public function render()
    {
        return view('livewire.website.slider.slider')->layout('layouts.frontEnd.app');
    }
}
