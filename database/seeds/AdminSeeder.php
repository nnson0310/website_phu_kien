<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_admin')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'name' => 'Admin',
            'phone' => '0977457889'
        ]);
    }
}
