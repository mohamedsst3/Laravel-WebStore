<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminAddCategoryComponent extends Component
{

    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $is_popular = 0;

    public function store(){
     
        $this->validate([
            'name' => ['required','min:3', 'max:40'],
            'image' =>'required',
            'is_popular' => 'required'
            
        ]);
        $data = new Category();
        $data->name = strip_tags($this->name);
        $data->slug = $this->slug;
        $imagename = Carbon::now()->timestamp.'.'. $this->image->extension();
        $this->image->storeAs('categories_image',$imagename);
        $data->image = $imagename;
        $data->is_popular = $this->is_popular;
        $data->save();
        return redirect()->route("admin.categories");
    }
    public function generateslug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
