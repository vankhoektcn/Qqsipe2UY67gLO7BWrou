<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Price_type;
use App\Common;
class Price_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Thỏa thuận', 'Triệu', 'Tỷ', 'Trăm nghìn/m2', 'Triệu/m2'];
        $from = [0, 1000000, 1000000000, 100000, 1000000];
        foreach ($names as $key => $value) 
        {
	        $project_type = Price_type::create([
	        	'key' => Common::createKeyURL($value),
                'name' => $value,
                'value' => $from[$key],
                'priority' => $key,
				'active' => 1,
				'created_by' => 'vankhoeseed',
				'updated_by' => 'vankhoeseed'
			]);
        }
    }
}
