<?php

use Illuminate\Database\Seeder;

class CategoryGoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category_good')->insert([
            'category_id' => 1,
            'good_id'=>1
        ]);
        DB::table('category_good')->insert([
            'category_id' => 1,
            'good_id'=>2
        ]);
        DB::table('category_good')->insert([
            'category_id' => 2,
            'good_id'=>3
        ]);

    }
}
