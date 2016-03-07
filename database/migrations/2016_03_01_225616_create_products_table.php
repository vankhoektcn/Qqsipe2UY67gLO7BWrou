<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');  

            $table->string('title')->index();               
            $table->string('key', 250)->index();            
            $table->integer('product_type_id')->index();
            $table->integer('province_id')->index();
            $table->integer('district_id')->index();  
            $table->integer('ward_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('area');
            $table->integer('price');
            $table->integer('price_type')->nullable();//
            $table->string('total_price')->nullable();
            $table->string('address',250);

            $table->text('summary');
            $table->text('description');
            $table->integer('home_direction')->nullable();
            $table->integer('room_number')->nullable();
            $table->integer('toilet_number')->nullable();
            $table->text('interior')->nullable();
            $table->string('main_image',250)->nullable();  

            $table->string('br_name',50)->nullable();//
            $table->string('br_address',250)->nullable();
            $table->string('br_phone',15)->nullable();//
            $table->string('br_email',100)->nullable();//
            
            $table->string('map_latitude',50)->nullable();          
            $table->string('map_longitude',50)->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->string('meta_keywords', 500)->nullable();

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
        Schema::drop('products');
    }
}
