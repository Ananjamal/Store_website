<?php

namespace App\Http\Livewire\Website\Categories;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public function render()
    {
        $categories =Category::all();

        return view('livewire.website.categories.categories',compact('categories'))->layout('layouts.frontEnd.app');
    }
}
