<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\ArticleCategory;
use App\ArticleCategoryTranslation;
use App\Article;
use App\ArticleTranslation;
use App\Attachment;
use App\Common;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generator = \Faker\Factory::create('vi_VN');
		
        $articleCategories = ['Thị trường nhà đất', 'Dự án căn hộ', 'Đầu tư căn hộ', 'Lời khuyên'];
        //, 'Vị trí bài viết', 'Slideshow chính', 'Trang chủ', 'Slideshow footer'];

        $articleCategoryPositionArticles = null;
        foreach ($articleCategories as $key => $value) {
	        $articleCategory = ArticleCategory::create([
				'key' => Common::createKeyURL($value),
				'parent_id' => is_null($articleCategoryPositionArticles) ? 0 : $articleCategoryPositionArticles->id,
				'priority' => $key,
				'is_publish' => 1,
				'created_by' => 'vankhoektcn',
				'updated_by' => 'vankhoektcn'
			]);
			ArticleCategoryTranslation::create([
				'article_category_id' => $articleCategory->id,
				'locale' => 'vi',
				'name' => $value,
				'summary' => $value,
				'meta_description' => $value,
				'meta_keywords' => $value,
			]);
			if ($value == 'Vị trí bài viết') {
				$articleCategoryPositionArticles = $articleCategory;
			}
        }

        $articles = ['Giới Thiệu', 'Tuyển Dụng', 'Tài Khoản Giao Dịch'];
        foreach ($articles as $key => $value) {
        	$article = Article::create([
				'key' => Common::createKeyURL($value),
				'priority' => $key,
				'is_publish' => 1,
				'created_by' => 'vankhoektcn',
				'updated_by' => 'vankhoektcn'
			]);
			ArticleTranslation::create([
				'article_id' => $article->id,
				'locale' => 'vi',
				'name' => $value,
				'summary' => $generator->text($maxNbChars = 200),
				'content' => $generator->realText($maxNbChars = 1000, $indexSize = 2),
				'meta_description' => $generator->text($maxNbChars = 200),
				'meta_keywords' => $generator->text($maxNbChars = 200)
			]);
        }

        $categories = ArticleCategory::where('parent_id','=',0)->lists('id');
        $categories2 = ArticleCategory::where('parent_id','<>',0)->lists('id');
		for ($i=0; $i < 3; $i++) { 
			$name = $generator->sentence($nbWords = 6);
			$key = Common::createKeyURL($name);
			$article = Article::create([
				'key' => $key,
				'priority' => $i,
				'is_publish' => 1,
				'created_by' => 'vankhoektcn',
				'updated_by' => 'vankhoektcn'
			]);
			ArticleTranslation::create([
				'article_id' => $article->id,
				'locale' => 'vi',
				'name' => $name,
				'summary' => $generator->text($maxNbChars = 200),
				'content' => $generator->text,
				'meta_description' => $generator->text($maxNbChars = 200),
				'meta_keywords' => $generator->text($maxNbChars = 200)
			]);

			Attachment::create([
				'entry_id' => $article->id,
				'table_name' => 'articles',
				//'path' => $generator->imageUrl($width = 795, $height = 497),
				'path' => '/uploads/notfound.jpg',
				'priority' => 0,
				'is_publish' => 1
			]);

			
			$article->categories()->attach($categories->random());
			//$article->categories()->attach($categories2->random());
		}
    }
}
