<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingSeeder extends Seeder
{
    public function run()
    {
        $toppings = [
            ['name' => 'Cheese'],
            ['name' => 'Tomato Sauce'],
            ['name' => 'Pepperoni'],
            ['name' => 'Ham'],
            ['name' => 'Chicken'],
            ['name' => 'Minced Beef'],
            ['name' => 'Sausage'],
            ['name' => 'Bacon'],
            ['name' => 'Onions'],
            ['name' => 'Green Peppers'],
            ['name' => 'Mushrooms'],
            ['name' => 'Sweetcorn'],
            ['name' => 'Jalapeno Peppers'],
            ['name' => 'Vegan Cheese'],
            ['name' => 'Pineapple'],
            ['name' => 'Salami'],
            ['name' => 'Olives'],
            ['name' => 'Spicy Beef'],
            ['name' => 'Hot Dog Pieces']
        ];

        DB::table('toppings')->insert($toppings);
    }
}