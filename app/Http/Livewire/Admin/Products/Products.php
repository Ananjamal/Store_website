<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $product_id;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'refreshPage' => 'refreshPage',
    ];

    public function mount()
    {
    }

    public function addProductModal()
    {
    }

    public function edit_product($id)
    {
        $this->product_id = $id;
    }
    public function delete_product($id)
    {
        $this->product_id = $id;
    }

    public function refreshPage()
    {
        session()->flash('success', 'successfully.');
    }

    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(5);


        return view('livewire.admin.products.products', compact('products'))->layout('layouts.admin.app');
    }
}
