<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('key', 250)->unique()->index();
			$table->integer('parent_id')->nullable();
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
		Schema::drop('article_categories');
	}
}
