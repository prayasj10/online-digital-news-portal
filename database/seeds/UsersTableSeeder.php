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
        \App\User::create([
            'name'=>'Prayas Joshi',
            'email'=>'prayas@gmail.com',
            'email_verified_at' =>now(),
            'password'=>Hash::make('password'),
            'status'=>1,
            'role_id'=>2,

        ]);
        \App\User::create([
        'name'=>'Ujjwal Maharjan',
        'email'=>'ujjwal@gmail.com',
        'email_verified_at' =>now(),
        'password'=>Hash::make('password'),
        'status'=>1,
            'role_id'=>3,

        ]);

        \App\User::create([
            'name'=>'Test User',
            'email'=>'test@test.com',
            'email_verified_at' =>now(),
            'password'=>Hash::make('password'),
            'status'=>1,
            'role_id'=>1,

        ]);
    }
}
