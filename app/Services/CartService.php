<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;

class CartService {
    private $session;
    private $instance;

    const DEFAULT_INSTANCE = 'shopping-cart';

    public function __construct(SessionManager $session)
    {
        $this->session = $session;

        $this->instance(self::DEFAULT_INSTANCE);
    }

    public function instance($instance = null)
    {
        $instance = $instance ?: self::DEFAULT_INSTANCE;

        $this->instance = $instance;

        return $this;
    }

    public function add($id, $name, $price, $quantity, $options = [])
    {
        $cartItem = $this->createCartItem($name, $price, $quantity, $options);

        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem->put('quantity', $content->get($id)->get('quantity') + $quantity);
        }

        $content->put($id, $cartItem);

        $this->session->put($this->instance, $content);
    }

    public function remove($id)
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $this->session->put($this->instance, $content->except($id));
        }
    }

    public function content()
    {
        return is_null($this->session->get($this->instance)) ? new Collection([]) : $this->session->get($this->instance);
    }

    public function total()
    {
        $content = $this->getContent();

        $total = $content->reduce(function ($total, $item) {
            return $total += $item->get('price') * $item->get('quantity');
        });

        return number_format($total, 2);
    }

    public function clear()
    {
        $this->session->forget($this->instance);
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
