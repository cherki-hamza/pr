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
        Schema::create('publisher_task_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('publisher_id')->nullable();
            $table->integer('publisher_payment_no_vat')->nullable();
            $table->integer('publisher_payment_paypal_vat')->nullable();
            $table->integer('publisher_payment')->nullable();
            $table->integer('task_id')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('publisher_task_payments');
    }
};
