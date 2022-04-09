<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_category')->insert([
            'cat_name' => 'Quần Áo',
            'cat_desc' => 'Quần Áo Cho Giới Trẻ',
            'cat_status' => 0
        ]);
    }
}
