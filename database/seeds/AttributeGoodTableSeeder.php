<?php

use Illuminate\Database\Seeder;

class AttributeGoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('attribute_good')->insert([
            'good_id' => 1,
            'attribute_id'=>1,
            'value'=>'150000'
        ]);
        DB::table('attribute_good')->insert([
            'good_id' => 1,
            'attribute_id'=>2,
            'value'=>'90/60/90'
        ]);
        DB::table('attribute_good')->insert([
            'good_id' => 1,
            'attribute_id'=>3,
            'value'=>'black'
        ]);
        DB::table('attribute_good')->insert([
            'good_id' => 2,
            'attribute_id'=>1,
            'value'=>'70000'
        ]);
        DB::table('attribute_good')->insert([
            'good_id' => 2,
            'attribute_id'=>2,
            'value'=>'30/30/30'
        ]);
        DB::table('attribute_good')->insert([
            'good_id' => 2,
            'attribute_id'=>3,
            'value'=>'red'
        ]);
        DB::table('attribute_good')->insert([
            'good_id' => 3,
            'attribute_id'=>1,
            'value'=>'90000'
        ]);
        DB::table('attribute_good')->insert([
            'good_id' => 3,
            'attribute_id'=>2,
            'value'=>'50/50/50'
        ]);
    }
}
