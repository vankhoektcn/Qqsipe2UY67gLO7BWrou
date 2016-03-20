<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Area_range;
use App\Common;
class Area_rangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Chưa xác định', '<= 30 m2', '30 - 50 m2', '50 - 80 m2', '80 - 100 m2'
        		,'100 - 150 m2', '150 - 200 m2', '200 - 250 m2', '250 - 300 m2', '300 - 500 m2', '>= 500 m2'];
        $from = [0, 0, 30, 50, 80
        		,100, 150, 200, 250, 300, 500];
        $to = [0, 29, 50, 80, 100
        		,150, 200, 250, 300, 500, 1000];
        foreach ($names as $key => $value) 
        {
	        $project_type = Area_range::create([
	        	'key' => Common::createKeyURL($value),
                'name' => $value,
                'from' => $from[$key],
                'to' => $to[$key],
                'priority' => $key,
				'active' => 1,
				'created_by' => 'vankhoeseed',
				'updated_by' => 'vankhoeseed'
			]);
        }
    }
}
