<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class AdminEditCategoryComponent extends Component
{
	public $slug;
	public $category_id;
	public $category_name;
	public $category_slug;

	public function mount($slug){
		$this->slug = $slug;
		$category = Category::where('slug', $slug)->first();
		$this->category_id = $category->id;
		$this->category_name = $category->name;
		$this->category_slug = $category->slug;
	}

	public function generateSlug(){
		$this->category_slug = Str::slug($this->category_name);
	}

	public function categoryUpdate(){
		$category = Category::find($this->category_id);
		$category->name = $this->category_name;
		$category->slug = $this->category_slug;
		$category->save();
		session()->flash('success', 'Category has been updated successfully!');
	}

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}
