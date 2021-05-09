<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\Cart as CartFacade;

class Cart extends Component
{
    public $total;
    public $content;

    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];

    public function mount()
    {
        $this->updateCart();
    }

    public function render()
    {
        $total = CartFacade::total();
        $content = CartFacade::content();

        return view('livewire.cart', [
            'total' => $total,
            'content' => $content,
        ]);
    }

    public function removeFromCart($id)
    {
        CartFacade::remove($id);
        $this->updateCart();
    }

    public function clearCart()
    {
        CartFacade::clear();
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->total = CartFacade::total();
        $this->content = CartFacade::content();
    }
}
