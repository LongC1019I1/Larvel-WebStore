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
        $user = new \App\User();
        $user->name = 'admin3';
        $user->email = 'admin3@gmail.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('123456');
        $user->save();
    }
}
