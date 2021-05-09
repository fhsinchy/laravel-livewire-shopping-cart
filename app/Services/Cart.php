<?php

namespace App\Services;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;

class Cart {
    private $session;
    private $instance = 'shopping-cart';

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function add($id, $price, $quantity, $options = [])
    {
        $cartItem = $this->createCartItem($price, $quantity, $options);

        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem->put('quantity', $cartItem->get('quantity') + $quantity);
        }

        $content->put($id, $cartItem);

        $this->session->put($this->instance, $content);
    }

    public function content()
    {
        return is_null($this->session->get($this->instance)) ? new Collection([]) : $this->session->get($this->instance);
    }

    protected function getContent() {
        return $this->session->has($this->instance) ? $this->session->get($this->instance) : new Collection;
    }

    protected function createCartItem($price, $quantity, $options) {
        return new Collection([
            'price' => floatval($price),
            'quantity' => intval($quantity, 10),
            'options' => $options,
        ]);
    }
}
