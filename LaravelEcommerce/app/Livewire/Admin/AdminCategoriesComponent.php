<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class AdminCategoriesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        
        $categories = Category::OrderBy('name', 'ASC')->paginate(5);
        return view('livewire.admin.admin-categories-component', ['categories'=> $categories]);
    }
}
