<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTutorRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_tutor_register', function (Blueprint $table) {
            $table->integer('tutor_register_id')->nullable()->unsigned()->index();
            $table->foreign('tutor_register_id')->references('id')->on('tutor_registers')->onDelete('cascade');
            $table->integer('district_id')->nullable()->unsigned()->index();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('district_tutor_register');
    }
}
