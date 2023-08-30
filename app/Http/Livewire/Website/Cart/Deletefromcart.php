<?php

namespace App\Http\Livewire\Website\Cart;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Storage;

class Deletefromcart extends Component
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
        // Delete associated order_product records
        Cart::where('product_id', $this->product_id)->delete();
        $this->emit('refreshpage');
        $this->emit('refreshCount');

    }
    public function render()
    {
        return view('livewire.website.cart.deletefromcart');
    }
}
