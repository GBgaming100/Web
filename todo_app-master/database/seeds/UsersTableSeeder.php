<?php

use Illuminate\Database\Seeder;
use app\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Admin',
            'email' => str_random(10).'maxvdboom1@outlook.com',
            'password' => bcrypt('AdminAdmin'),
        ]);
    }
}
