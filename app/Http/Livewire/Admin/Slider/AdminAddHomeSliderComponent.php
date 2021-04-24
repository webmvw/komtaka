<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;

class AdminAddHomeSliderComponent extends Component
{
	use WithFileUploads;

	public $slider_title;
	public $slider_subtitle;
	public $price;
	public $link;
	public $status;
	public $image;

	public function mount(){
		$this->status = 1;
	}

	public function homesliderStore(){
		$slider = new HomeSlider;
		$slider->title = $this->slider_title;
		$slider->subtitle = $this->slider_subtitle;
		$slider->price = $this->price;
		$slider->link = $this->link;
		$slider->status = $this->status;
		if($this->image != null){
            $filename = time().$this->image->getClientOriginalName();
            $this->image->storeAs('homeslider',$filename);
            $slider->image = $filename;
        }
        $slider->save();
        session()->flash('success', 'Home Slider has been added success');
	}


    public function render()
    {
        return view('livewire.admin.slider.admin-add-home-slider-component')->layout('layouts.base');
    }
}
