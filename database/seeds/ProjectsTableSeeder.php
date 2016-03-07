<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\ProjectCategory;
use App\Project;
use App\Attachment;
use App\Common;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectCategories = ['Dự án nổi bật', 'Dự án mới nhất', 'Căn hộ sang nhượng', "Căn hộ cho thuê", 'Vị trí dự án', 'Slideshow chính', 'Trang chủ', 'Slideshow footer'];

        $projectCategoryPositionProjects = null;
        foreach ($projectCategories as $key => $value) {
	        $projectCategory = ProjectCategory::create([
				'key' => Common::createKeyURL($value),
				'parent_id' => is_null($projectCategoryPositionProjects) ? 0 : $projectCategoryPositionProjects->id,

				'name' => $value,
				'summary' => $value,
				'meta_description' => $value,
				'meta_keywords' => $value,

				'priority' => 0,
				'active' => 1,
				'created_by' => 'vankhoektcn',
				'updated_by' => 'vankhoektcn'
			]);

			if ($value == 'Vị trí dự án') {
				$projectCategoryPositionProjects = $projectCategory;
			}
        }

    }
}
