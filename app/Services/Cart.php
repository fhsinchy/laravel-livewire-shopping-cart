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

    public function add($id, $name, $price, $quantity, $options = [])
    {
        $cartItem = $this->createCartItem($name, $price, $quantity, $options);

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

    public function total()
    {
        $content = $this->getContent();

        $total = $content->reduce(function ($total, $item) {
            return $total += $item->price * $item->quantity;
        });

        return number_format($total, 2);
    }

    protected function getContent() {
        return $this->session->has($this->instance) ? $this->session->get($this->instance) : new Collection;
    }

    protected function createCartItem($name, $price, $quantity, $options) {
        return new Collection([
            'name' => $name,
            'price' => floatval($price),
            'quantity' => intval($quantity, 10),
            'options' => $options,
        ]);
    }
}
