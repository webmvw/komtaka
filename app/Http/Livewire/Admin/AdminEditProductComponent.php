<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use File;

class AdminEditProductComponent extends Component
{
	use WithFileUploads;

	public $slug;
	public $product_id;
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
	public $newImage;

	public function generateSlug(){
		$this->product_slug = Str::slug($this->product_name);
	}

	public function mount($slug){
		$this->slug = $slug;
		$product = Product::where('slug', $slug)->first();
		$this->product_id = $product->id;
		$this->product_name = $product->name;
		$this->product_slug = $product->slug;
		$this->short_description = $product->short_description;
		$this->description = $product->description;
		$this->regular_price = $product->regular_price;
		$this->sale_price = $product->sale_price;
		$this->SKU = $product->SKU;
		$this->stock_status = $product->stock_status;
		$this->feature = $product->feature;
		$this->quantity = $product->quantity;
		$this->category = $product->category_id;
		$this->image = $product->image;
	}

	public function productUpdate(){
		$product = Product::find($this->product_id);
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

		if($this->newImage != null){
			if(File::exists('assets/images/products/'.$product->image)){
	            File::delete('assets/images/products/'.$product->image);
	        }
            $filename = time().'.'.$this->newImage->extension();
            $this->newImage->storeAs('products',$filename);
            $product->image = $filename;
        }
        $product->save();
        session()->flash('success', 'Product has been updated successfully!');
	}


    public function render()
    {
    	$categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
