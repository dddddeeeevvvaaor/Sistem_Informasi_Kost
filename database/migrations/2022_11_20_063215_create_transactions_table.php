<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            //menambahkan kolom pada tabel transactions
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->enum('payment_method', ['cash', 'transfer']);
            $table->integer('total');
            $table->text('description')->nullable();
            $table->enum('status', ['accept', 'pending'])->default('pending');
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
        Schema::dropIfExists('transactions');
    }
}
