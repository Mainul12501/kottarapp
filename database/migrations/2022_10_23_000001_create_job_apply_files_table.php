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
        Schema::create('job_apply_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('apply_job_id');
            $table->string('file_url')->nullable();
            $table->string('file_type')->nullable();
            $table->integer('file_size')->nullable();

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
        Schema::dropIfExists('job_apply_files');
    }
};
