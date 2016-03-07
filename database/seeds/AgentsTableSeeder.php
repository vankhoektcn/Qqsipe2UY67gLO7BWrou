<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Agent;
use App\Common;
class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agents = ['Bùi Mỹ Vân'
        , 'Bùi Thanh Hà'];
        $emails = ['vanland09a@gmail.com'
        , 'buithanhha@gmail.com'];
        $mobiles = ['0932622017'
        , '01654477039'];
        $thumnails = ['/frontend/images1/Agents/BuiMyVan.png'
        , '/frontend/images1/Agents/BuiThanhHa.png'];
        foreach ($agents as $key => $value) 
        {
	        $project_type = Agent::create([
                'name' => $agents[$key],
                'email' => $emails[$key],
                'mobile' => $mobiles[$key],
                'thumnail' => $thumnails[$key],
                'priority' => $key,
				'active' => 1,
				'created_by' => 'vankhoe',
				'updated_by' => 'vankhoe'
			]);
        }
    }
}
