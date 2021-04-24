<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminCategoryComponent extends Component
{
	use WithPagination;

	public function deleteCategory($id){
		$category = Category::find($id);
		$category->delete();
		session()->flash('success', 'Category has been deleted successfully!');
	}

    public function render()
    {
    	$categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('livewire.admin.admin-category-component', ['categories'=>$categories])->layout('layouts.base');
    }
}
