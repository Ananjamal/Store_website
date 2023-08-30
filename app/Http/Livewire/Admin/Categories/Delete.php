<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public $category_id;
    public $category;

    public function mount($id)
    {
        $this->category_id = $id;
        $categ = Category::findOrFail($id);
        $this->category = $categ->toArray();
    }

    public function destroyCategory()
    {
        Category::find($this->category_id)->delete();
        Storage::disk('public')->delete($this->category['image']);

        $this->emit('alertSuccess', __('Added successfully'));
        $this->emit('refreshPage');
    }

    public function render()
    {
        return view('livewire.admin.categories.delete');
    }
}
