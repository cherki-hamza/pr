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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('company_website')->nullable();
            $table->string('country')->nullable();
            $table->text('about')->nullable();
            $table->string('mobile')->nullable();
            $table->string('picture')->nullable();
            $table->string('more_info')->nullable();
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
        Schema::dropIfExists('profiles');
    }
};
