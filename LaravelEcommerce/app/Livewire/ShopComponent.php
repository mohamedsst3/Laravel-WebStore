<?php

namespace App\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    
    use WithPagination;

    public $PageProductsLimit = 12;

    public $OrderBy = "Default";

    public $min_price = 0;

    public $max_price = 1000;

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

    public function AddTowhishList($product_id, $product_name, $product_price) {

        Cart::instance("wishlist")->add($product_id,$product_name,1, $product_price)->associate('\App\Model\Product');
        return redirect()->route("shop");

    }

    public function RemoveItemFromWishliast($product_id) {

        foreach(Cart::instance('wishlist')->content() as $witem) {

            if($witem->id == $product_id){
                Cart::instance("wishlist")->remove($witem->rowId);
            }
        }
    }

    public function render()
    {
        
       if($this->OrderBy == "PriceLowToHigh") {
        
            $pagination =  Product::WhereBetween('regular_price', [$this->min_price,$this->max_price])->OrderBy("regular_price", "ASC")->paginate($this->PageProductsLimit);

        } else if($this->OrderBy == "PriceHighToLow") {
            $pagination =  Product::WhereBetween('regular_price', [$this->min_price,$this->max_price])->OrderBy("regular_price", "DESC")->paginate($this->PageProductsLimit);

        } else if($this->OrderBy == "MostRecent") {
            $pagination =  Product::WhereBetween('regular_price', [$this->min_price,$this->max_price])->OrderBy("created_at", "DESC")->paginate($this->PageProductsLimit);

        } else{
            $pagination = Product::WhereBetween('regular_price', [$this->min_price,$this->max_price])->paginate($this->PageProductsLimit);

        }

        
        $categories = Category::OrderBy('name', 'ASC')->get();

        
        return view('livewire.shop-component', ['pagination' => $pagination, 'Categories' => $categories]);
    }
}
