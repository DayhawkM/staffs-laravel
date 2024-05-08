<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $fillable = ['name'];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}