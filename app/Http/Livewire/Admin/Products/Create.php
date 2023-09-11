<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Http\Livewire\Admin\Products\Products;
use App\Models\Product;


class Create extends Component
{
    use WithFileUploads;
    public $products;

    public $product_id;
    public $category_id;
    public $name;
    public $description;
    public $image;
    public $price;

    protected function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required|min:5',
            'description' => 'required|min:6',
            'image' => 'required|max:1024', // 1MB Max
            'price' => 'required', // 1MB Max

        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function mount()
    {
    }

    public function store()
    {
        $validatedData = $this->validate();

        // $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        // $this->image->storeAs('categories' ,$imageName, 'public');
        $this->image->store('products', 'public');
        $this->products['image'] = 'products/' . $this->image->hashName();

        $products = Product::create([
            'category_id' => $this->category_id,

            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->products['image'], // Save the image name in the database
            'price' => $this->price,

        ]);

        $this->resetInput();
        // $this->emit('hideModal');
        $this->emit('alertSuccess', __("Added successfully"));
        $this->emit('refreshPage');
    }

    public function resetInput()
    {
        $this->category_id = null;

        $this->name = null;
        $this->image = null;
        $this->description = null;
        $this->price = null;
    }


    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.products.create', compact('categories'));
    }
}
