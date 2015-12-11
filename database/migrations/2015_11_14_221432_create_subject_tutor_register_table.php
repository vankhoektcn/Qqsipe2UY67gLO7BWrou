<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTutorRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_tutor_register', function (Blueprint $table) {
            $table->integer('tutor_register_id')->nullable()->unsigned()->index();
            $table->foreign('tutor_register_id')->references('id')->on('tutor_registers')->onDelete('cascade');
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
        Schema::drop('subject_tutor_register');
    }
}
