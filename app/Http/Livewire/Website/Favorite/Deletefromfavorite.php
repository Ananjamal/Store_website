<?php

namespace App\Http\Livewire\Website\Favorite;

use App\Models\Product;
use Livewire\Component;
use App\Models\Favorite;

class Deletefromfavorite extends Component
{
    public $product_id;
    public $product;
    protected $listeners = [
        'refreshpage' => 'refreshpage',
    ];

    public function mount($id)
    {
        $this->product_id = $id;
        $pro = Product::findOrFail($id);

        $this->product = $pro->toArray();
    }
    public function destroyProduct()
    {
        $favorite = Favorite::where('product_id', $this->product_id)->delete();
        
        $this->emit('refreshpage');

        $this->emit('refreshCount');
    }

    public function refreshpage()
    {
    }
    public function render()
    {
        return view('livewire.website.favorite.deletefromfavorite');
    }
}
