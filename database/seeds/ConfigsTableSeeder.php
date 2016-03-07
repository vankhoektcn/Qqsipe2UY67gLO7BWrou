<?php

use Illuminate\Database\Seeder;
use App\Config;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
			'key' => 'site_title',
			'text' => 'Tiêu đề trang web',
			'value' => 'Tiêu đề trang web'
		]);
		Config::create([
			'key' => 'meta_description',
			'text' => 'Meta Description',
			'value' => 'Meta Description'
		]);
		Config::create([
			'key' => 'meta_keywords',
			'text' => 'Meta Keywords',
			'value' => 'Meta Keywords'
		]);
		Config::create([
			'key' => 'rows_per_page_article',
			'text' => 'Số bài viết hiển thị trên một trang',
			'value' => '20'
		]);
		Config::create([
			'key' => 'rows_per_page_product',
			'text' => 'Số sản phẩm hiển thị trên một trang',
			'value' => '20'
		]);
		Config::create([
			'key' => 'rows_per_page_project',
			'text' => 'Số dự án hiển thị trên một trang',
			'value' => '20'
		]);
		Config::create([
			'key' => 'headquarter_address',
			'text' => 'Địa chỉ trụ sở chính',
			'value' => 'Địa chỉ trụ sở chính'
		]);
		Config::create([
			'key' => 'headquarter_phone_number',
			'text' => 'Số điện thoại trụ sở chính',
			'value' => '0909-999999'
		]);
		Config::create([
			'key' => 'address_sender_mail',
			'text' => 'Địa chỉ gửi email',
			'value' => 'no-reply@crazyify.com'
		]);
		Config::create([
			'key' => 'display_name_send_mail',
			'text' => 'Tên hiển thị trên email liên hệ',
			'value' => 'Tên hiển thị trên email liên hệ'
		]);
		Config::create([
			'key' => 'address_received_mail',
			'text' => 'Địa chỉ nhận email liên hệ',
			'value' => 'phantsang@gmail.com'
		]);

		Config::create([
			'key' => 'yahoo_support',
			'text' => 'Hỗ trợ qua Yahoo',
			'value' => 'yahooid'
		]);
		Config::create([
			'key' => 'skype_support',
			'text' => 'Hỗ trợ qua Skype',
			'value' => 'skypeid'
		]);
		Config::create([
			'key' => 'facebook_page',
			'text' => 'Địa chỉ Facebook',
			'value' => 'https://fb.com/'
		]);
    }
}
