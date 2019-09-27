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
         DB::table('users')->insert([
            'email' => 'mcd77.1990@gmail.com',
            'password' => md5('123'),
        ]);
    }
}
