<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('helloworld'),
            'role'=>1
        ]);
        DB::table('users')->insert([
            'name' => 'moderator',
            'email'=>'moderator@gmail.com',
            'password'=>bcrypt('helloworld'),
            'role'=>2
        ]);
    }
}
