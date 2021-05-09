<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    protected $total;
    protected $content;

    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];

    public function mount()
    {
        $this->updateCart();
    }

    public function render()
    {
        return view('livewire.cart', [
            'total' => $this->total,
            'content' => $this->content,
        ]);
    }

    public function removeFromCart($id)
    {
        Cart::remove($id);
        $this->updateCart();
    }

    public function clearCart()
    {
        Cart::clear();
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->total = Cart::total();
        $this->content = Cart::content();
    }
}
