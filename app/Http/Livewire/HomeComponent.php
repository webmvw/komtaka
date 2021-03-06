<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\HomeCategory;

class HomeComponent extends Component
{
    public function render()
    {
    	$homesliders = HomeSlider::where('status', '1')->get();
    	$latest_products = Product::orderBy('created_at', 'desc')->get()->take(10);
    	$homecategories = HomeCategory::all();
    	$OnSaleProduct = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(10);
        return view('livewire.home-component', ['homesliders'=>$homesliders, 'latest_products'=>$latest_products, 'homecategories'=>$homecategories, 'OnSaleProduct'=>$OnSaleProduct])->layout('layouts.base');
    }
}
