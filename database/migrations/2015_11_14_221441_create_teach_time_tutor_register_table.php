<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachTimeTutorRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teach_time_tutor_register', function (Blueprint $table) {
            $table->integer('tutor_register_id')->nullable()->unsigned()->index();
            $table->foreign('tutor_register_id')->references('id')->on('tutor_registers')->onDelete('cascade');
            $table->integer('teach_time_id')->nullable()->unsigned()->index();
            $table->foreign('teach_time_id')->references('id')->on('teach_times')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teach_time_tutor_register');
    }
}
