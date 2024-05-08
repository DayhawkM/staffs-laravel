<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    public function run()
    {
        $pizzas = [
            ['name' => 'Margherita', 's_price' => 8.00, 'm_price' => 9.00, 'l_price' => 12.00],
            ['name' => 'Gimme the Meat', 's_price' => 11.00, 'm_price' => 14.50, 'l_price' => 16.50],
            ['name' => 'Veggie Delight', 's_price' => 10.00, 'm_price' => 13.00, 'l_price' => 15.00],
            ['name' => 'Make Mine Hot', 's_price' => 11.00, 'm_price' => 13.00, 'l_price' => 15.00]
        ];

        DB::table('pizzas')->insert($pizzas);
    }
}