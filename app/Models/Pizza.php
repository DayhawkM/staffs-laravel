<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['name', 's_price', 'm_price', 'l_price'];

    public function toppings()
    {
        return $this->belongsToMany(Topping::class);
    }
}