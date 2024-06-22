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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('pr_user_id')->nullable();
            $table->integer('pr_site_id')->nullable();
            $table->string('site_name')->nullable();
            $table->string('site_url')->nullable();
            $table->string('site_category')->nullable();
            $table->integer('site_monthly_traffic')->nullable();
            $table->integer('site_domain_rating')->nullable();
            $table->integer('site_domain_authority')->nullable();
            $table->string('site_images')->nullable();
            $table->string('site_language')->nullable();
            $table->integer('site_price')->nullable();
            $table->integer('site_price2')->nullable();
            $table->integer('site_c_p_price')->nullable();
            $table->integer('site_c_c_p_price')->nullable();
            $table->string('site_sposored')->nullable();
            $table->string('site_indexed')->nullable();
            $table->string('site_dofollow')->nullable();
            $table->string('site_link_allow')->nullable();
            $table->string('site_time')->nullable();
            $table->string('site_region_location')->nullable();
            $table->string('spam_score')->nullable();
            $table->string('word_limite')->nullable();
            $table->text('special_requirement')->nullable();
            $table->enum('site_status',[0,1,2])->default(1);
            $table->enum('super_admin_status',[0,1])->default(1);
            $table->enum('publisher_status',[0,1])->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('sites');
    }
};
