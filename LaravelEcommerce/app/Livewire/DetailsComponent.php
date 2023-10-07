<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug) {
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price) {
    Cart::add($product_id, $product_name,1 ,$product_price)->associate("\App\Model\Product");
    session()->flash("success_message", "Add To Cart Successfuly Added");
    return redirect()->route("shop.cart");
    }

    public function render()
    {
        // The first method returns the first element in the collection that passes a given truth test
        $product = Product::where("slug", $this->slug)->first();
        $relatedProducts = Product::where("category_id", $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.details-component', ['product' => $product, 'RelatedProducts' => $relatedProducts, 'LatestProduct' => $nproducts]);
    }
}
