<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_id;
    public $name;
    public $slug;

    public function mount($category_id) {

      $category = Category::find($category_id);
      $this->category_id = $category->id;
      $this->name = $category->name;
      $this->slug = $category->slug;
    }

    public function generateSlug() {
      $this->slug = Str::slug($this->name);
    }

    public function update_category() {

        $this->validate([
            'name' => 'required'
        ]);
        
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('succuess_message', 'category Has Been Updated');
        return redirect()->route('admin.categories');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component');
    }
}
