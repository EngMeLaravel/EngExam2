<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \Illuminate\Support\Facades\DB::table('admins')->insert([
            'name' => 'MXT2K',
            'email' => 'someemail@gmail.com',
            'password' => bcrypt('mypass'),
        ]);
    }
}
