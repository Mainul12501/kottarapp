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
        Schema::create('job_post_project', function (Blueprint $table) {
            $table->unsignedBigInteger('job_post_id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('job_post_id', 'job_post_id_fk_3360')->references('id')->on('job_posts')->onDelete('cascade');
            $table->foreign('project_id', 'project_id_fk_3360')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_post_project');
    }
};
