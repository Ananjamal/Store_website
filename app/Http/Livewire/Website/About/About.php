<?php

namespace App\Http\Livewire\Website\About;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.website.about.about')->layout('layouts.frontEnd.app');
    }
}
