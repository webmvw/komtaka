<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use File;

class AdminProductComponent extends Component
{
	use WithPagination;

	public function deleteProduct($id){
		$product = Product::find($id);
		if(File::exists('assets/images/products/'.$product->image)){
            File::delete('assets/images/products/'.$product->image);
        }
		$product->delete();
		session()->flash('success', 'Product has been deleted successfully!');
	}

    public function render()
    {
    	$products = Product::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.admin-product-component', ['products'=>$products])->layout('layouts.base');
    }
}
