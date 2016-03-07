<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Product_type;
use App\Common;
class Product_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_types = ['Căn hộ bán', 'Căn hộ sang nhượng', 'Căn hộ cho thuê'];
        $product_types_meta_description = ['Bán căn hộ. Căn hộ chính chủ, sổ hồng, căn hộ chất lượng, cập nhật thông tin mua bán căn hộ mới nhất trên khắp các tỉnh thành Hồ Chí Minh, Hà Nội, Đà nẵng, Bình Dương'
        , 'Căn hộ sang nhượng'
        , 'Căn hộ cho thuê'];
        $product_types_meta_keywords = ['Bán căn hộ, bán căn hộ quận 2, căn hộ chính chủ, căn hộ sổ hồng.'
        , 'Căn hộ sang nhượng'
        , 'Căn hộ cho thuê'];
        
        foreach ($product_types as $key => $value) 
        {
            $product_type = Product_type::create([
                'key' => Common::createKeyURL($value),
                'name' => $value,
                'priority' => $key,
                'meta_description' => $product_types_meta_description[$key],
                'meta_keywords' => $product_types_meta_keywords[$key],
                'active' => 1,
                'created_by' => 'vankhoe',
                'updated_by' => 'vankhoe'
            ]);
        }
    }
}
