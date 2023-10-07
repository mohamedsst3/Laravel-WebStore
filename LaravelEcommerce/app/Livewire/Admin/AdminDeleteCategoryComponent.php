<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminDeleteCategoryComponent extends Component
{

    public $id;

    public function mount($category_id){
        $this->id = $category_id;
    }


    public function render()
    {
        $category =  Category::where('id',$this->id)->delete();
        session()->flash('success_message', 'The Cateory Has Been Deleted Successfly');
        return view('livewire.admin.admin-delete-category-component');
    }
}
