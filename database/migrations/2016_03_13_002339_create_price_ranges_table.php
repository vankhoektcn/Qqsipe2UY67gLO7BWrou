<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 250)->unique()->index();
            $table->string('name', 250);
            $table->bigInteger('from');
            $table->bigInteger('to');
            
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
        Schema::drop('price_ranges');
    }
}
