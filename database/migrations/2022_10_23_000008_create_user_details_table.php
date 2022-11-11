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
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('country')->nullable();
            $table->string('emirate_state_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('educational_status')->nullable();
            $table->string('university_name')->nullable();
            $table->string('freelancer_job_title')->nullable();
            $table->string('freelancer_language')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('emirates_id_no')->nullable();
            $table->longText('freelancer_description')->nullable();
            $table->tinyInteger('Working_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_establish_year')->nullable();
            $table->string('company_status')->nullable();
            $table->string('business_name')->nullable();
            $table->string('company_size')->nullable();
            $table->string('company_speciality')->nullable();
            $table->string('company_service')->nullable();
            $table->string('trade_license_no')->nullable();

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
        Schema::dropIfExists('user_details');
    }
};
