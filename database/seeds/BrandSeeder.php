<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_brand')->insert([
            'brand_name' => 'Samsung',
            'brand_desc' => 'Nhà sản xuất smartphone hàng đầu thế giới',
            'brand_status' => 0
        ]);
    }
}
