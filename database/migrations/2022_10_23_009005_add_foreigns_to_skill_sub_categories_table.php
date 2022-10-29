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
        Schema::table('skill_sub_categories', function (Blueprint $table) {
            $table
                ->foreign('skill_category_id')
                ->references('id')
                ->on('skill_categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill_sub_categories', function (Blueprint $table) {
            $table->dropForeign(['skill_category_id']);
        });
    }
};
