<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRegisterTeachTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_register_teach_time', function (Blueprint $table) {
            $table->integer('student_register_id')->nullable()->unsigned()->index();
            $table->foreign('student_register_id')->references('id')->on('student_registers')->onDelete('cascade');
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
        Schema::drop('student_register_teach_time');
    }
}
