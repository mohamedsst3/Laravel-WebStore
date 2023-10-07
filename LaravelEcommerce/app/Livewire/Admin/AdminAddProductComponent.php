<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status = "instock";
    public $featured = 0;
    public $category_id = 0;
    public $image;
    public $quantity;

    public function generateslug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function addProduct() {

        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'SKU' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'quantity' => 'required',

        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->category_id = $this->category_id;
        $imagename = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products', $imagename); // to save the image in the folder
        $product->Image = $imagename;
        $product->quantity = $this->quantity;

        $product->save();
        return redirect()->route('admin.product');

    }


    public function render()
    {
        $categories = Category::orderBy('name', 'DESC')->get();
        return view('livewire.admin.admin-add-product-component', ['categories' => $categories]);
    }
}
