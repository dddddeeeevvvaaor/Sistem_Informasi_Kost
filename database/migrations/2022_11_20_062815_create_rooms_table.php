<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            //Add attributs name, type, description, room_area, price, currency
            $table->id();
            $table->string('name')->unique();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('room_area')->nullable();
            $table->integer('price');
            $table->char('currency', 5)->default('IDR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
