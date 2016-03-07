<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Project_type;
use App\Common;
class Project_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_types = ['Căn hộ chung cư'
        , 'Khu biệt thự'
        , 'Cao ốc văn phòng'
        , 'Khu thương mại'
        , 'Khu dân cư'
        , 'Nhà ở xã hội'
        , 'Khu đô thị mới'];
        $project_types_meta_description = ['Căn hộ chung cư'
        , 'Khu biệt thự'
        , 'Cao ốc văn phòng'
        , 'Khu thương mại'
        , 'Khu dân cư'
        , 'Nhà ở xã hội'
        , 'Khu đô thị mới'];
        $project_types_meta_keywords = ['Căn hộ chung cư'
        , 'Khu biệt thự'
        , 'Cao ốc văn phòng'
        , 'Khu thương mại'
        , 'Khu dân cư'
        , 'Nhà ở xã hội'
        , 'Khu đô thị mới'];
        
        foreach ($project_types as $key => $value) 
        {
	        $project_type = Project_type::create([
				'key' => Common::createKeyURL($value),
                'name' => $value,
                'priority' => $key,
                'meta_description' => $project_types_meta_description[$key],
				'meta_keywords' => $project_types_meta_keywords[$key],
				'active' => 1,
				'created_by' => 'vankhoe',
				'updated_by' => 'vankhoe'
			]);
        }
    }
}
