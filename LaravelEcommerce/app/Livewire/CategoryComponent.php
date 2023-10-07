<?php

namespace App\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;

    public $PageProductsLimit = 12;

    public $OrderBy = "Default";

    public $slug = null;

    public function store($product_id, $product_name, $product_price) {
    Cart::add($product_id, $product_name, 1, $product_price)->associate("\App\Model\Product");
    session()->flash("success_message", "Item added To The Cart");
    return redirect()->route("shop.cart");
    }
    public function SetPageProductsLimit($PageProductsLimit) {
     $this->PageProductsLimit = $PageProductsLimit;
    }

    public function SetOrderingTheProductsBy($orderby){

        $this->OrderBy = $orderby;
    }

    public function mount($slug) {
    $this->slug = $slug;
    }

    public function render()
    {

        $category_id = Category::Where("slug", $this->slug)->first();

       if($this->OrderBy == "PriceLowToHigh") {
        
            $pagination =  Product::Where("category_id",$category_id->id)->OrderBy("regular_price", "ASC")->paginate($this->PageProductsLimit);

        } else if($this->OrderBy == "PriceHighToLow") {
            $pagination =  Product::Where("category_id",$category_id->id)->OrderBy("regular_price", "DESC")->paginate($this->PageProductsLimit);

        } else if($this->OrderBy == "MostRecent") {
            $pagination =  Product::Where("category_id",$category_id->id)->OrderBy("created_at", "DESC")->paginate($this->PageProductsLimit);
        } else{
            $pagination = Product::Where("category_id",$category_id->id)->paginate($this->PageProductsLimit);

        }

        
        $categories = Category::OrderBy('name', 'ASC')->get();

        
        return view('livewire.category-component', ['pagination' => $pagination, 'Categories' => $categories]);
    }
}
