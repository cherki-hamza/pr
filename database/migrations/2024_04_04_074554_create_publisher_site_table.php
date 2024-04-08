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
        Schema::create('publisher_site', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('publisher_id');
            $table->unsignedBiginteger('site_id');


            $table->foreign('publisher_id')->references('id')
                 ->on('publishers')->onDelete('cascade');
            $table->foreign('site_id')->references('id')
                ->on('sites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publisher_site');
    }
};
