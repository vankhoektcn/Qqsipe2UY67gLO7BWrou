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

            $table->integer('price_range_id')->nullable();
            $table->integer('area_range_id')->nullable();
            $table->integer('incense_type_id')->nullable();

            $table->integer('area');
            $table->float('price');
            $table->integer('price_type_id')->nullable();//
            $table->string('total_price')->nullable();
            $table->string('address',250);

            $table->timestamp('expire_at')->nullable();
            $table->text('summary');
            $table->text('description');
            $table->integer('home_direction')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('toilets')->nullable();
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
            $table->integer('user_id');
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
