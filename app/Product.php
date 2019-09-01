<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'brand', 'price', 'variant_category', 'variant_value'
    ];
}
