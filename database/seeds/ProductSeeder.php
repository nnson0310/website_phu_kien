<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_product')->insert([
            'cat_id' => 1,
            'brand_id' => 1,
            'product_name' => 'Điện thoại Xiaomi Mi 9',
            'product_desc' => 'Điện thoại Xiaomi Mi 9 RAM 4/64GB',
            'product_content' => 'Điện thoại Xiaomi Mi 9 phiên bản ram 4gb bộ nhớ trong 64gb. Lựa chọn hợp túi tiền của giới trẻ',
            'product_image' => 'XiaomiMi9_Ram4_64GB.jpg',
            'product_price' => '9.500.000',
            'product_quantity' => '100',
            'product_status' => 0
        ]);
    }
}
