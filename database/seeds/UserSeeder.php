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
            'name'=> 'Caca',
            'email'=> 'caca@gmail.com',
            'email_verified_at'=> now(),
            'password'=> Hash::make('kasir'),
            'remember_token'=> Str::random(10),
            'role'=> 'kasir',
        ]);
    }
}
