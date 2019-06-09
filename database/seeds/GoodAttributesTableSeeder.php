<?php

use Illuminate\Database\Seeder;

class GoodAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('good_attributes')->insert([
            'good_id' => 1,
            'attribute_id'=>1,
            'value'=>'150000'
        ]);
        DB::table('good_attributes')->insert([
            'good_id' => 1,
            'attribute_id'=>2,
            'value'=>'90/60/90'
        ]);
        DB::table('good_attributes')->insert([
            'good_id' => 1,
            'attribute_id'=>3,
            'value'=>'black'
        ]);
        DB::table('good_attributes')->insert([
            'good_id' => 2,
            'attribute_id'=>1,
            'value'=>'70000'
        ]);
        DB::table('good_attributes')->insert([
            'good_id' => 2,
            'attribute_id'=>2,
            'value'=>'30/30/30'
        ]);
        DB::table('good_attributes')->insert([
            'good_id' => 2,
            'attribute_id'=>3,
            'value'=>'red'
        ]);
        DB::table('good_attributes')->insert([
            'good_id' => 3,
            'attribute_id'=>1,
            'value'=>'90000'
        ]);
        DB::table('good_attributes')->insert([
            'good_id' => 3,
            'attribute_id'=>2,
            'value'=>'50/50/50'
        ]);
    }
}
