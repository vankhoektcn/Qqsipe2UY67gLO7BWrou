<?php

use Illuminate\Database\Seeder;
use App\Subject;
use App\SubjectTranslation;
use App\Common;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = ['Toán', 'Lý', 'Hoá', 'Sinh', 'Văn', 'Sử','Địa', 'Tiếng Anh', 'Tiếng Pháp','Tiếng Nga', 'Tiếng Nhật', 'Tiếng Đức', 'Tin Học'];

        foreach ($subjects as $key => $value) 
        {
	        $subject = Subject::create([
				'key' => Common::createKeyURL($value),
				'priority' => 0,
				'is_publish' => 1,
				'created_by' => 'vankhoe',
				'updated_by' => 'vankhoe'
			]);
			SubjectTranslation::create([
				'subject_id' => $subject->id,
				'locale' => 'vi',
				'name' => $value
			]);
        }
    }
}
