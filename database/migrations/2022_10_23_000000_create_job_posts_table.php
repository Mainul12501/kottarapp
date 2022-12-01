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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('skill_category_id');
            $table->unsignedBigInteger('skill_sub_category_id');
            $table->unsignedBigInteger('client_user_id');
            $table->string('job_unique_code')->nullable()->unique();
            $table->text('project_title')->nullable();
            $table->longText('project_description')->nullable();
            $table->tinyInteger('experience_level')->default(0)->comment('0=>excited, 1 => eager, 2 => experienced, 3 => expert')->nullable();
            $table->tinyInteger('budget_type')->default(0)->comment('0=> fixed; 1 => per hour')->nullable();
            $table->float('budget')->default(0)->nullable();
            $table->float('budget_per_hour')->nullable();
            $table->integer('total_hour')->nullable();
            $table->float('total_budget_for_client')->nullable();
            $table->tinyInteger('public_visibility')->default(0)->comment('0 => public, 1=> private')->nullable();
            $table->tinyInteger('freelancer_working_type')->default(0)->comment('0=>remotely, 1=> remotely on country, 2=> on site')->nullable();
            $table->string('preferred_freelancer_location_country')->nullable();
            $table->string('job_location_city')->nullable();
            $table->string('job_starting_date')->nullable();
            $table->string('job_starting_date_timestamp')->nullable();
            $table->string('job_ending_time')->nullable();
            $table->string('job_ending_time_timestamp')->nullable();
            $table->mediumInteger('job_total_duration')->nullable();
            $table->mediumInteger('job_total_length')->nullable();
            $table->string('estimate_project_duration_type')->comment('1 day or less/ less than a week etc')->nullable();
            $table->string('estimate_project_duration_time')->nullable();
            $table->string('estimate_project_duration_time_timestamp')->nullable();
            $table->tinyInteger('promotion_type')->comment('0=>no promotion, 1=>featured, 2=> urgent, 3=>pre-funded')->nullable();
            $table->string('job_post_slug')->nullable();
            $table->dateTime('post_expire_date')->nullable();
            $table->string('post_expire_date_timestamp')->nullable();
            $table->tinyInteger('status')->comment('0=>pending, 1=> approved, 2=>completed, 3=>rejected')->default(0)->nullable();

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
        Schema::dropIfExists('job_posts');
    }
};
