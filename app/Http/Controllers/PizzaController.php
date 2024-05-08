<?php
namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Models\Topping;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        $toppings = Topping::all(); // Fetch all toppings

        return view('welcome', compact('pizzas', 'toppings'));
    }
}