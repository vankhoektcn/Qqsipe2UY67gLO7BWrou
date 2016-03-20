<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Incense_type;
use App\Common;
class Incense_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Đông', 'Tây', 'Nam', 'Bắc', 'Đông Nam' ,'Đông Bắc', 'Tây Nam', 'Tây Bắc'];
        
        foreach ($names as $key => $value) 
        {
	        $incense_type = Incense_type::create([
	        	'key' => Common::createKeyURL($value),
                'name' => $value,
                'priority' => $key,
				'active' => 1,
				'created_by' => 'vankhoeseed',
				'updated_by' => 'vankhoeseed'
			]);
        }
    }
}
