<?php

namespace App\Http\Livewire\Admin\Categories;
use Livewire\Component;

use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $categories;
    public $category_id;
    public $name;
    public $description;
    public $image;

    public function mount($id)
    {
        $this->category_id = $id;

        $postt = Category::findOrFail($id);
        $this->category = $postt->toArray();

    }


    protected function rules()
    {
        return [
            'category.name' => 'required|min:6',
            'category.description' => 'required|min:6',
            'image' => 'max:1024', // 1MB Max
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function update()
    {
        $validatedData = $this->validate();

        // Retrieve the existing category by its ID
        $category = Category::findOrFail($this->category_id);

        // Store the new image
        if ($this->image) {
            // Store the new image
            $this->image->store('categories', 'public');
            $this->categories['image'] = 'categories/' . $this->image->hashName();

            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
        } else {
            // If no new image is provided, retain the existing image path
            $this->categories['image'] = $category->image;
        }

        // Update the category's information
        $category->update([
            'name' => $this->category['name'],
            'description' => $this->category['description'],
            'image' => $this->categories['image'],
        ]);

        $this->emit('alertSuccess', __("Added successfully"));
        $this->emit('refreshPage');    }

    public function render()
    {
        
        return view('livewire.admin.categories.edit');
    }
}
