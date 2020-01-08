<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('admins')->insert([
            'name' => 'MXT2K',
            'email' => 'someemail@gmail.com',
            'password' => bcrypt('mypass'),
        ]);
    }
}
