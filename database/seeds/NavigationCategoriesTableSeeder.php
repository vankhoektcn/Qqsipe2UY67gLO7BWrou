<?php

use Illuminate\Database\Seeder;
use App\NavigationCategory;
use App\NavigationCategoryTranslation;
use App\Common;

class NavigationCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $value = 'Banner Chính';

		$navigationCategory = NavigationCategory::create([
				'key' => Common::createKeyURL($value),
				'parent_id' => 0,
				'priority' => 0,
				'is_publish' => 1,
				'created_by' => 'phantsang',
				'updated_by' => 'phantsang'
			]);
		NavigationCategoryTranslation::create([
				'navigation_category_id' => $navigationCategory->id,
				'locale' => 'vi',
				'name' => $value,
				'summary' => $value
			]);
    }
}
