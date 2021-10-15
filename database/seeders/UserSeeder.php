<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'name'       => 'test'. Str::random(3),
            'email'      => 'test'. Str::random(3).'@gmail.com',
//            'password'   => Hash::make('password'),
            'password'   => 12345,

            'created_at' => Carbon::today()->subDays(rand(0, 365))
        ]);

    }
}
