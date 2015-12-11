<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 50);
            $table->string('name', 250);
            $table->string('for_class', 250);
            $table->integer('subject_id');
            $table->string('address', 500);
            $table->integer('salary');
            $table->string('time', 250);
            $table->integer('day_number')->nullable();
            $table->string('required', 250)->nullable();
            $table->string('contactinfo', 500)->nullable();
            $table->boolean('status');
            
            $table->integer('priority');
            $table->boolean('is_publish');
            $table->string('created_by', 50);
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
        Schema::drop('new_class');
    }
}
