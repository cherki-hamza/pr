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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('project_id');
            $table->integer('site_id');
            $table->integer('pr_user_id')->nullable();
            $table->integer('order_id');
            $table->integer('status')->default(0);
            $table->integer('task_status')->default(0);
            $table->text('task_editor_data')->nullable();
            $table->enum('task_type',['c_p','c_c_p'])->nullable();
            $table->string('task_target_url')->nullable();
            $table->string('task_anchor_text');
            $table->string('task_price')->nullable();
            $table->string('task_package')->nullable();
            $table->text('task_special_requirement')->nullable();
            $table->text('task_post_placement_url')->nullable();
            $table->string('db')->default('client');
            $table->integer('publisher_status')->default(0);
            $table->integer('publisher_final_status')->default(0);
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
        Schema::dropIfExists('tasks');
    }
};
