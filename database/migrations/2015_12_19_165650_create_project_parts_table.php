<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->index();
            $table->string('name')->index();
            $table->string('key', 250)->index();
            $table->string('link');
            $table->string('type',20)->default('E');
            $table->string('class')->default('scroll');
            $table->string('fa_icon')->nullable();
            $table->string('sumary')->nullable();  
            $table->text('content');
            
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
        Schema::drop('project_parts');
    }
}
