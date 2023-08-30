<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public $product_id;
    public $product;

    public function mount($id)
    {
        $this->product_id = $id;
        $pro = Product::findOrFail($id);
        $this->product = $pro->toArray();
    }

    public function destroyProduct()
    {
        Product::find($this->product_id)->delete();
        Storage::disk('public')->delete($this->product['image']);

        $this->emit('alertSuccess', __('Added successfully'));
        $this->emit('refreshPage');
    }
    public function render()
    {
        return view('livewire.admin.products.delete');
    }
}
