<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 250)->unique()->index();
            $table->string('name', 250);
            $table->integer('from');
            $table->integer('to');
            
            $table->integer('priority');
            $table->boolean('active');
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
        Schema::drop('area_ranges');
    }
}
