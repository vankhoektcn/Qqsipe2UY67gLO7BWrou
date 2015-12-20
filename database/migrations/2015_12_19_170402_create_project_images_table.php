<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_images', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->index();
            $table->string('title')->index(); 
            $table->string('link');
            $table->string('class')->nullable();
            $table->string('fa_icon')->nullable();
            $table->string('caption');  
            $table->text('content')->nullable();
            
            $table->integer('priority');
            $table->boolean('active')->default(0);
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
        Schema::drop('project_images');
    }
}
