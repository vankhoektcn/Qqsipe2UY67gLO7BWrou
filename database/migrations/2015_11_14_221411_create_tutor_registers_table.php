<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_registers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 250);
            $table->string('email', 250);
            $table->string('mobile', 250);
            $table->integer('sex');
            $table->integer('district_id');
            $table->string('address')->nullable();
            $table->integer('teacher_level');
            $table->integer('experient')->nullable();
            $table->string('company', 250)->nullable();
            $table->boolean('primary')->nullable();
            $table->boolean('secondary')->nullable();
            $table->boolean('highshool')->nullable();
            $table->integer('salary')->nullable();
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
        Schema::drop('tutor_registers');
    }
}
