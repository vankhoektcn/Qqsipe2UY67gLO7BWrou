<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('navigation_id')->unsigned();
            $table->string('locale', 5);
            $table->string('name', 250);
            $table->string('summary', 500);
            $table->string('link', 250);
            $table->unique(['navigation_id','locale']);
            $table->foreign('navigation_id')->references('id')->on('navigations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('navigation_translations');
    }
}
