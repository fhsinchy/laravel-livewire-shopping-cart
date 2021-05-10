<?php

namespace App\Facades;

use App\Services\CartService;
use Illuminate\Support\Facades\Facade;

class Cart extends Facade {
    protected static function getFacadeAccessor()
    {
        return CartService::class;
    }
}
