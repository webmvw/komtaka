<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HomeSlider;
use File;

class AdminHomeSliderComponent extends Component
{
	use WithPagination;

	public function deleteHomeSlider($id){
		$homeslider = HomeSlider::find($id);
		if(File::exists('assets/images/homeslider/'.$homeslider->image)){
            File::delete('assets/images/homeslider/'.$homeslider->image);
        }
		$homeslider->delete();
		session()->flash('success', 'HomeSlider has been deleted successfully!');
	}

    public function render()
    {
    	$homeSliders = HomeSlider::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.slider.admin-home-slider-component', ['homeSliders'=>$homeSliders])->layout('layouts.base');
    }
}
