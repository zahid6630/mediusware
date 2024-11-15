<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
                'name'          => 'K B M Zahid Hasan',
                'account_type'  => 1,
                'balance'       => 0,
                'email'         => 'zahid6630@gmail.com',
                'password'      => \Hash::make('123456'),
            ]
        );
    }
}
