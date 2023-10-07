<?php

namespace App\Livewire;

use Cart;
use Livewire\Component;



use App\Http\Livewire\CartIconComponent;
class CartComponent extends Component
{
   

    public function increaseQuantity($row_id){
    $product = Cart::instance('cart')->get($row_id);
    $qty = $product->qty + 1;
    Cart::instance('cart')->aupdate($row_id, $qty);
    return redirect()->route("shop.cart");
    }

    public function decreaseQuantity($row_id){
    $product = Cart::instance('cart')->get($row_id);
    $qty = $product->qty - 1;
    Cart::instance('cart')->aupdate($row_id, $qty);
    return redirect()->route("shop.cart");
 }

    public function destroy($row_id){
    Cart::instance('cart')->remove($row_id);
    session()->flash("success_message", "Remove Item Has been Done");
    return redirect()->route("shop.cart");
    }
    public function clearAll() {
        Cart::instance('cart')->destroy();
        return redirect()->route("shop.cart");
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}

