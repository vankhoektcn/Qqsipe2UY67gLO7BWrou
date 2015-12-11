<?php

use Illuminate\Database\Seeder;
use App\TeachTime;
use App\Common;

class TeachTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['S', 'C', 'T'];
        $teachTimes = ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'];
        foreach ($types as $typeKey => $type) 
        {        	
	        foreach ($teachTimes as $key => $value) 
	        {
		        $teachTime = TeachTime::create([
                    'key' => $value,
					'type' => $type,
					'priority' => 0,
					'is_publish' => 1,
					'created_by' => 'vankhoe',
					'updated_by' => 'vankhoe'
				]);
	        }
        }
    }
}
