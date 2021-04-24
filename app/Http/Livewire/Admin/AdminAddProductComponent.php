<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class AdminAddProductComponent extends Component
{
	use WithFileUploads;

	public $product_name;
	public $product_slug;
	public $short_description;
	public $description;
	public $regular_price;
	public $sale_price;
	public $SKU;
	public $stock_status;
	public $feature;
	public $quantity;
	public $category;
	public $image;

	public function generateSlug(){
		$this->product_slug = Str::slug($this->product_name);
	}

	public function mount(){
		$this->stock_status = "instock";
		$this->feature = 0;
	}

	public function productStore(){
		$product = new Product;
		$product->name = $this->product_name;
		$product->slug = $this->product_slug;
		$product->short_description = $this->short_description;
		$product->description = $this->description;
		$product->regular_price = $this->regular_price;
		$product->sale_price = $this->sale_price;
		$product->SKU = $this->SKU;
		$product->stock_status = $this->stock_status;
		$product->feature = $this->feature;
		$product->quantity = $this->quantity;
		$product->category_id = $this->category;

		if($this->image != null){
            $filename = time().'.'.$this->image->extension();
            $this->image->storeAs('products',$filename);
            $product->image = $filename;
        }
        $product->save();
        session()->flash('success', 'Product has been added successfully!');
	}


    public function render()
    {
    	$categories = Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
