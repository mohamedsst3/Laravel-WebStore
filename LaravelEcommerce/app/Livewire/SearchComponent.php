<?php

namespace App\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    public $PageProductsLimit = 12;

    public $OrderBy = "Default";

    public $q;

    public $search_term;

    public function mount() {
        $this->fill(request()->only('q'));
        $this->search_term = '%' . $this->q . '%';
    }

    public function store($product_id, $product_name, $product_price) {
    Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate("\App\Model\Product");
    session()->flash("success_message", "Item added To The Cart");
    return redirect()->route("shop.cart");
    }
    public function SetPageProductsLimit($PageProductsLimit) {
     $this->PageProductsLimit = $PageProductsLimit;
    }

    public function SetOrderingTheProductsBy($orderby){

        $this->OrderBy = $orderby;
    }

    public function render()
    {

        
       if($this->OrderBy == "PriceLowToHigh") {
        
            $pagination =  Product::Where("name", 'like', $this->search_term)->OrderBy("regular_price", "ASC")->paginate($this->PageProductsLimit);

        } else if($this->OrderBy == "PriceHighToLow") {
            $pagination =  Product::Where("name", 'like', $this->search_term)->OrderBy("regular_price", "DESC")->paginate($this->PageProductsLimit);

        } else if($this->OrderBy == "MostRecent") {
            $pagination =  Product::Where("name", 'like', $this->search_term)->OrderBy("created_at", "DESC")->paginate($this->PageProductsLimit);

        } else{
            $pagination = Product::Where("name", 'like', $this->search_term)->paginate($this->PageProductsLimit);

        }

        
        $categories = Category::OrderBy('name', 'ASC')->get();

        
        return view('livewire.search-component', ['pagination' => $pagination, 'Categories' => $categories]);
    }
}
