<?php

namespace App\Http\Livewire\Admin\Categories;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $categories;
    public $name;
    public $description;
    public $image;

    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'description' => 'required|min:6',
            'image' => 'required|max:1024', // 1MB Max
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
        $this->image->store('categories', 'public');
        $this->categories['image'] = 'categories/' . $this->image->hashName();

        $category = Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->categories['image'], // Save the image name in the database
        ]);

        $this->resetInput();
        // $this->emit('hideModal');
        $this->emit('alertSuccess', __("Added successfully"));
        $this->emit('refreshPage');
    }

    public function resetInput()
    {
        $this->name = null;
        $this->image = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.admin.categories.create');
    }
}
