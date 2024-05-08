<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaToppingTable extends Migration
{
    public function up()
    {
        Schema::create('pizza_topping', function (Blueprint $table) {
            $table->foreignId('pizza_id')->constrained()->onDelete('cascade');
            $table->foreignId('topping_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizza_topping');
    }
}