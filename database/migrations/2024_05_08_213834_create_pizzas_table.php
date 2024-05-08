<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasTable extends Migration
{
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('s_price', 8, 2);
            $table->decimal('m_price', 8, 2);
            $table->decimal('l_price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}