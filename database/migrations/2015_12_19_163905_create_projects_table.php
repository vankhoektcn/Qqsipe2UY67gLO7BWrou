<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');  

            $table->string('name')->index();               
            $table->string('key', 250)->index();
            $table->integer('project_type_id')->index();
            $table->integer('province_id')->index();
            $table->integer('district_id')->index();            
            $table->integer('ward_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('address');
            $table->string('hotline',50);
            $table->string('hotline_fa_icon',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('logo',250)->nullable();         
            $table->boolean('show_slide')->default(1);
            $table->string('map_latitude',50)->nullable();          
            $table->string('map_longitude',50)->nullable();
            $table->text('content')->nullable();
            $table->string('meta_description', 500);
            $table->string('meta_keywords', 500);

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
        Schema::drop('projects');
    }
}
