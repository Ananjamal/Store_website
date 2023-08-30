<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public $category_id;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'Category-Added' => 'RefreshCreateCategory',
        'Category-Updated' => 'RefreshUpdatedCategory',
        'Category-Deleted' => 'RefreshDeletedCategory',
        'refreshPage' => 'refreshPage',
    ];

    public function mount()
    {
    }

    public function addCategoryModal()
    {
    }

    public function edit_category($id)
    {
        $this->category_id = $id;
    }
    public function delete_category($id)
    {
        $this->category_id = $id;
    }

    public function refreshPage()
    {
        session()->flash('success', 'successfully.');
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(5);

        return view('livewire.admin.categories.categories', compact('categories'))->layout('layouts.admin.app');
    }
}
