<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminDeleteSliderComponent extends Component
{
    public $slider_id;

    public function mount($slider_id){
   
        $this->slider_id = $slider_id;
    }
 
    public function render()
    {
         HomeSlider::where('id',$this->slider_id)->delete();
        
        return view('livewire.admin.admin-delete-slider-component');
    }
}
