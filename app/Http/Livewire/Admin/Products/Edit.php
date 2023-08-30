<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;
    // public $products;

    // public $product_id;
    // public $category_id;
    // public $name;
    // public $description;
    // public $image;
    // public $price;

    public $product;
    public $imageTemp;

    public function mount($id)
    {
        // $this->product_id = $id;

        // $this->product = Product::findOrFail($id);
        // // $this->product = $postt->toArray();
        $this->product_id = $id;
        $this->categories = Category::all();
        $prod = Product::findOrFail($id);
        $this->product = $prod->toArray();
    }
    protected function rules()
    {
        return [
            'product.category_id' => 'min:6',
            'product.name' => 'string|min:6',
            'product.description' => 'string||min:6',
            'product.price' => 'numeric|min:6',
            'imageTemp' => 'max:1024', // 1MB Max
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function update()
    {
        // $validatedData = $this->validate();

        // Retrieve the existing category by its ID
        // $product = Product::findOrFail($this->product_id);
        // // dd($product);
        // // Store the new image
        // if ($this->image) {
        //     // Store the new image
        //     $this->image->store('products', 'public');
        //     $this->products['image'] = 'products/' . $this->image->hashName();

        //     if ($product->image && Storage::disk('public')->exists($product->image)) {
        //         Storage::disk('public')->delete($product->image);
        //     }
        // } else {
        //     // If no new image is provided, retain the existing image path
        //     $this->products['image'] = $product->image;
        // }

        // // Update the category's information

        // $product->update([
        //     'category_id' => $this->product['category_id'],
        //     'name' => $this->product['name'],
        //     'description' => $this->product['description'],
        //     'image' => $this->products['image'],
        //     'price' => $this->product['price'],
        // ]);
        $pro = Product::findOrFail($this->product_id);

        if ($this->imageTemp) {
            // Delete the existing image if it exists
            if ($this->imageTemp && Storage::disk('public')->exists($this->product['image'])) {
                Storage::disk('public')->delete($this->product['image']);
            }

            // Store the new image
            $imagePath = $this->imageTemp->store('products', 'public');
            $this->product['image'] = $imagePath;
        }

        $pro->update($this->product);

        $this->emit('alertSuccess', __('Added successfully'));
        $this->emit('refreshPage');
    }
    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.products.edit', compact('categories'));
    }
}
