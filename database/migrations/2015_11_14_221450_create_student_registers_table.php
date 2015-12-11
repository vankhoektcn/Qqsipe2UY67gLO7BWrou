<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registers', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name', 250);
            $table->string('email', 250);
            $table->string('mobile', 250);
            $table->integer('sex');
            $table->integer('district_id');
            $table->string('address')->nullable();
            $table->integer('class');
            $table->string('level');
            $table->string('school', 250)->nullable();
            $table->integer('cost')->nullable();
            $table->string('other_require', 500)->nullable();

            $table->integer('priority')->nullable();
            $table->boolean('is_publish')->nullable();
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->string('deleted_by', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_registers');
    }
}
