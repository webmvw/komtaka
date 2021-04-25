<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
	public $category;
	public $item_no;

	public function homeCategoryStore(){
		$search_category = HomeCategory::where('category_id', $this->category)->get()->count();
		if($search_category > 0){
			session()->flash('error', 'this category already exists!');
		}else{
			$home_category = new HomeCategory;
			$home_category->category_id = $this->category;
			$home_category->item_no = $this->item_no;
			$result = $home_category->save();
			if($result){
				$this->category = '';
				$this->item_no = '';
			}
			session()->flash('success', 'Home Category added success'); 
		}
	}

    public function render()
    {
    	$categories = Category::all();
        return view('livewire.admin.admin-home-category-component', ['categories'=>$categories])->layout('layouts.base');
    }
}
