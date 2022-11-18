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
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_post_id');
            $table->unsignedBigInteger('freelancer_user_id');
            $table->longText('proposal_text')->nullable();
            $table->integer('budget_proposal')->nullable();
            $table->tinyInteger('first_time_proposal_submit')->nullable()->default(0)->comment('0=>No; 1 => yes');
            $table->dateTime('project_starting_date')->nullable();
            $table->dateTime('project_ending_date')->nullable();
            $table->tinyInteger('is_selected_for_project')->nullable()->comment('0 => no, 1 => yes')->default(0);
            $table->tinyInteger('status')->nullable()->default(3)->comment('0 => rejected; 1 => declined by system; 2 => approved; 3 => applied');

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
        Schema::dropIfExists('apply_jobs');
    }
};
