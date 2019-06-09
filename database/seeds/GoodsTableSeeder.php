<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('goods')->insert([
            'name' => 'iphone 6'
        ]);
        DB::table('goods')->insert([
            'name' => 'LeEco'
        ]);
        DB::table('goods')->insert([
            'name' => 'Macbook'
        ]);
    }
}
