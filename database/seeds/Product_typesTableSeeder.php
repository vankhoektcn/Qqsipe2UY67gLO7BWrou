<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Product_type;
use App\Common;
class Product_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_types = ['Căn hộ bán', 'Căn hộ sang nhượng', 'Căn hộ cho thuê'];
        
        foreach ($product_types as $key => $value) 
        {
	        $product_type = Product_type::create([
				'key' => Common::createKeyURL($value),
                'name' => $value,
				'priority' => 0,
				'active' => 1,
				'created_by' => 'vankhoe',
				'updated_by' => 'vankhoe'
			]);
        }
    }
}
