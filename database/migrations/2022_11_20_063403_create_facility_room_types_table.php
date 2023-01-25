<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_room_types', function (Blueprint $table) {
            //meambahkan kolom pada tabel facility_room_types
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities');
            $table->foreignId('room_type_id')->constrained('room_types');
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
        Schema::dropIfExists('facility_room_types');
    }
}
