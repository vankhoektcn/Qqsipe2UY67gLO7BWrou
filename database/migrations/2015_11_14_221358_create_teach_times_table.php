<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('teach_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 250);
            $table->string('type', 10);

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
        Schema::drop('teach_times');
    }
}
