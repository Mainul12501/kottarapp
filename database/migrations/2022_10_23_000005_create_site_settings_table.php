<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_title')->nullable();
            $table->string('site_name')->nullable();
            $table->string('site_fav_icon')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_banner')->nullable();
            $table->longText('site_meta')->nullable();
            $table->string('author_name')->nullable();
            $table->mediumInteger('job_post_validate_time')->nullable();
            $table->longText('seo_header')->nullable();
            $table->longText('seo_footer')->nullable();
            $table->mediumInteger('job_service_charge')->nullable();

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
        Schema::dropIfExists('site_settings');
    }
};
