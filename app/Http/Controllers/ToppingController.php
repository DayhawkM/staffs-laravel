<?php

namespace App\Http\Controllers;

use App\Models\Topping;
use Illuminate\Http\Request;

class ToppingController extends Controller
{
    public function index()
    {
        $toppings = Topping::pluck('name'); // Fetching all topping names directly
        return view('welcome', compact('toppings'));
    }
}