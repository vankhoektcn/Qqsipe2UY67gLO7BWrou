<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRegisterSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_register_subject', function (Blueprint $table) {
            $table->integer('student_register_id')->nullable()->unsigned()->index();
            $table->foreign('student_register_id')->references('id')->on('student_registers')->onDelete('cascade');
            $table->integer('subject_id')->nullable()->unsigned()->index();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_register_subject');
    }
}
