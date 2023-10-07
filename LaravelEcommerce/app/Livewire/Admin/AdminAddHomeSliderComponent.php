<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $status;
    public $offer;
    public $link;
    public $image;

    public function StoreNewSlider(){

        $this->validate([

            'top_title' => ['required','min:3','max:20'],
            'title' => ['required'],
            'sub_title' => ['required'],
            'status' => ['required'],
            'offer' => ['required'],
            'link' => ['required'],
            'image' => ['required']
        ]);

        $HomeSlider = new HomeSlider();
        $HomeSlider->top_title = $this->top_title;
        $HomeSlider->title = $this->title;
        $HomeSlider->sub_title = $this->sub_title;
        $HomeSlider->status = $this->status;
        $HomeSlider->link = $this->link;
        $HomeSlider->offer = $this->offer;
        $imagename = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider', $imagename); // to save the image in the folder
        $HomeSlider->image = $imagename;
        $HomeSlider->save();
        return redirect()->route('admin.homeslider');

    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component');
    }
}
