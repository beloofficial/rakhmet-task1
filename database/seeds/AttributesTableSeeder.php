<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('attributes')->insert([
            'name' => 'price'
        ]);
        DB::table('attributes')->insert([
            'name' => 'shape'
        ]);
        DB::table('attributes')->insert([
            'name' => 'color'
        ]);
    }
}
