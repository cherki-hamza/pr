<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('balance')->nullable();
            $table->string('bonus')->nullable();
            $table->string('reserved')->nullable();
            $table->string('transaction_description')->nullable();
            $table->string('transaction_amount')->nullable();
            $table->string('payment_platform')->nullable();
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
        Schema::dropIfExists('balances');
    }
};
