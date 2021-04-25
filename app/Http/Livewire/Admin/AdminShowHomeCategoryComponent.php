<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeCategory;

class AdminShowHomeCategoryComponent extends Component
{
	public function deleteHomeCategory($id){
		$homeCategory = HomeCategory::find($id);
		$homeCategory->delete();
		session()->flash('success', 'Home Category has been deleted successfully!');
	}
	
    public function render()
    {
    	$home_categoryies = HomeCategory::all();
        return view('livewire.admin.admin-show-home-category-component', ['home_categoryies'=>$home_categoryies])->layout('layouts.base');
    }
}
