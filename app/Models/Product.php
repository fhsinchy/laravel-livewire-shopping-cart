<?php

namespace App\Models;

use App\Contracts\Cartable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // you only live once
    protected $guarded = [];

    public function getPriceAttribute($value)
    {
        return number_format($value, 2);
    }
}
