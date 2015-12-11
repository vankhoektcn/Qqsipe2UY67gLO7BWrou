<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationCategoryTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navigation_category_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('navigation_category_id')->unsigned();
			$table->string('locale', 5);
			$table->string('name', 250);
			$table->string('summary', 500);

			$table->unique(['navigation_category_id','locale'], 'navigation_category_id_locale_unique');
			$table->foreign('navigation_category_id')->references('id')->on('navigation_categories')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('navigation_category_translations');
	}
}
