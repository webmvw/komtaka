<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class AdminAddCategoryComponent extends Component
{
	public $category_name;
	public $category_slug;

	public function generateSlug(){
		$this->category_slug = Str::slug($this->category_name);
	}

	public function categoryStore(){
		$category = new Category;
		$category->name = $this->category_name;
		$category->slug = $this->category_slug;
		$category->save();
		session()->flash('success', 'Category has been created successfully!');
	}

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
