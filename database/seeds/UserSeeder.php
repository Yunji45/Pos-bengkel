<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'email_verified_at'=> now(),
            'password'=> Hash::make('admin'),
            'remember_token'=> Str::random(10),
            'role'=> 'admin',
        ]);
    }
}
