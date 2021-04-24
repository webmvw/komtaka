<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
    	$homesliders = HomeSlider::where('status', '1')->get();
        return view('livewire.home-component', ['homesliders'=>$homesliders])->layout('layouts.base');
    }
}
