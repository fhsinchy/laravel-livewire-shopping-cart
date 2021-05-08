<?php

namespace App\Services;

use App\Objects\CartItem;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;

class Cart {
    private $session;
    private $instance = 'shopping-cart';

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function add($product, $quantity)
    {
        $cartItem = $this->createCartItem($product, $quantity);

        $content = $this->getContent();

        if ($content->has($product->id)) {
            $cartItem->setQuantity($content->get($product->id)->quantity() + $quantity);
        }

        $content->put($product->id, $cartItem);

        $this->session->put($this->instance, $content);
    }

    public function content()
    {
        return is_null($this->session->get($this->instance)) ? new Collection([]) : $this->session->get($this->instance);
    }

    protected function getContent() {
        return $this->session->has($this->instance) ? $this->session->get($this->instance) : new Collection;
    }

    protected function createCartItem($product, $quantity) {
        return new CartItem($product, $quantity);
    }
}
