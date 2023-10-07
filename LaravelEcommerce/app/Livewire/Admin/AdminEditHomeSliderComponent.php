<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $slider_id;
    public $top_title;
    public $title;
    public $sub_title;
    public $status;
    public $offer;
    public $link;
    public $image;
    public $newimage;
    
    public function mount($slider_id) {
      $this->slider_id = $slider_id;
      $HomdeSlider = HomeSlider::find($slider_id);
      $this->top_title = $HomdeSlider->top_title;
      $this->title = $HomdeSlider->title;
      $this->status = $HomdeSlider->status;
      $this->offer = $HomdeSlider->offer;
      $this->sub_title = $HomdeSlider->sub_title;
      $this->link = $HomdeSlider->link;
      $this->image = $HomdeSlider->image;

    }

    public function UpdateSlider() {
        $HomeSlider = HomeSlider::find($this->slider_id);
        $HomeSlider->top_title = $this->top_title;
        $HomeSlider->title = $this->title;
        $HomeSlider->sub_title = $this->sub_title;
        $HomeSlider->status = $this->status;
        $HomeSlider->link = $this->link;
        $HomeSlider->offer = $this->offer;
        if($this->newimage){
            $imagename = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('slider', $imagename); // to save the image in the folder
            $HomeSlider->image = $imagename;
        }

        $HomeSlider->save();
        session()->flash('succuess_message', 'Home Slider Has Been Updated Successfuly');
        return redirect()->route('admin.homeslider');
    }


    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component');
    }
}
