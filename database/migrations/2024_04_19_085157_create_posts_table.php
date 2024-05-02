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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('site_id')->nullable();
            $table->integer('task_id')->nullable();
            $table->string('post_title')->nullable();
            $table->text('post_body')->nullable();
            $table->text('post_note')->nullable();
            $table->integer('status')->default(0);
            $table->integer('client_status')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
