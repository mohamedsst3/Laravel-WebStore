<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
        
        $HomeSlider = HomeSlider::where('status',1)->get();
        $LatestProduct = Product::orderBy('created_at','DESC')->get()->take(8);
        $FeateredProducts = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        $arr = [];
        $popular_category = Category::where('is_popular',1)->get();
        foreach($popular_category as $pcategory){
            $arr[] = $pcategory->id;
        }
        $PopularProducts = Product::where('category_id',$arr)->get()->take(8);
        return view('livewire.home-component', 
        ['HomeSlider' => $HomeSlider, 
        'LatestProduct' => $LatestProduct, 
        'FeateredProducts' => $FeateredProducts,
        'PopularProducts' => $PopularProducts
    ]);
    }
}
