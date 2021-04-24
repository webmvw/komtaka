<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;
use File;

class AdminEditHomeSliderComponent extends Component
{
	use WithFileUploads;

	public $slider_id;
	public $slider_title;
	public $slider_subtitle;
	public $price;
	public $link;
	public $status;
	public $image;
	public $newImage;

	public function mount($id){
		$homeslider = HomeSlider::find($id);
		$this->slider_id = $homeslider->id;
		$this->slider_title = $homeslider->title;
		$this->slider_subtitle = $homeslider->subtitle;
		$this->price = $homeslider->price;
		$this->link = $homeslider->link;
		$this->status = $homeslider->status;
		$this->image = $homeslider->image;
	}

	public function homesliderupdate(){
		$slider = HomeSlider::find($this->slider_id);
		$slider->title = $this->slider_title;
		$slider->subtitle = $this->slider_subtitle;
		$slider->price = $this->price;
		$slider->link = $this->link;
		$slider->status = $this->status;
		if($this->newImage != null){
			if(File::exists('assets/images/homeslider/'.$slider->image)){
	            File::delete('assets/images/homeslider/'.$slider->image);
	        }
            $filename = time().$this->newImage->getClientOriginalName();
            $this->newImage->storeAs('homeslider',$filename);
            $slider->image = $filename;
        }
        $slider->save();
        session()->flash('success', 'Home Slider has been updated success');
	}

    public function render()
    {
        return view('livewire.admin.slider.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
