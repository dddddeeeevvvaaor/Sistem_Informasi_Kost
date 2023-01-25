<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add
        Schema::table('rooms', function (Blueprint $table){
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->foreign('room_type_id')->references('id')->on('room_types');
            $table->dropColumn('type');
            $table->dropColumn('room_area');
            $table->dropColumn('price');
            $table->dropColumn('currency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Add
        Schema::table('rooms', function (Blueprint $table){
            $table->dropForeign(['room_type_id']);
            $table->dropColumn('room_type_id');
            $table->string('type')->nullable();
            $table->string('room_area')->nullable();
            $table->integer('price');
            $table->char('currency', 3)->default('IDR');
        });
    }
}
