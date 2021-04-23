<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class CategoryComponent extends Component
{
	use WithPagination;

	public $sorting;
	public $pagesize;
    public $category_slug;

	public function mount($slug){
		$this->sorting = "default";
		$this->pagesize = 12;
        $this->category_slug = $slug;
	}

	public function store($product_id, $product_name, $product_price){
		Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
		session()->flash('success_message', 'Item added in Cart');
		return redirect()->route('cart');
	}

    public function render()
    {

        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

    	if($this->sorting == 'date'){
    		$products = Product::where('category_id', $category_id)->orderBy('created_at', 'desc')->paginate($this->pagesize);
    	}elseif($this->sorting == 'price'){
    		$products = Product::where('category_id', $category_id)->orderBy('regular_price', 'asc')->paginate($this->pagesize);
    	}elseif($this->sorting == 'price-desc'){
    		$products = Product::where('category_id', $category_id)->orderBy('regular_price', 'desc')->paginate($this->pagesize);
    	}else{
    		$products = Product::where('category_id', $category_id)->paginate(12);
    	}

        $categories = Category::all();

        return view('livewire.category-component', ['products'=>$products, 'categories'=>$categories, 'category_name'=>$category_name])->layout('layouts.base');
    }
}
