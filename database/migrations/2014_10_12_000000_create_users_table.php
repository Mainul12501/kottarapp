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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_details_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('user_role_type')->comment('1=>freelancer, 2=>client, 3=>admin_lv, 4=>trainer, 5 => SuperAdmin')->default(0)->nullable();
            $table->string('account_type')->comment('featured/regular')->nullable();
            $table->tinyInteger('account_status')->comment('0 => pending, 1 => approved, 2 =>blocked, 3=>canceled')->default(0)->nullable();
            $table->tinyInteger('submit_status')->default(0)->comment('0 => Not submitted; 1 => submitted; 2 => submitted and approved');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
