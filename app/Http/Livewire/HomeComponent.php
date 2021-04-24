<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;

class HomeComponent extends Component
{
    public function render()
    {
    	$homesliders = HomeSlider::where('status', '1')->get();
    	$latest_products = Product::orderBy('created_at', 'desc')->get()->take(10);
        return view('livewire.home-component', ['homesliders'=>$homesliders, 'latest_products'=>$latest_products])->layout('layouts.base');
    }
}
