<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class Product extends Component
{
    public $product;
    public $quantity;

    public function mount()
    {
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function addToCart()
    {
        Cart::add($this->product->id, $this->product->price, $this->quantity);
    }

    public function removeFromCart()
    {
        //
    }

    public function showCart()
    {
        dd(Cart::content());
    }
}
