<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //Create a new user 
        // $user = new \App\Models\User();
        // $user->name = 'Admin';
        // $user->email = 'admin@gmail.com';
        // $user->password = bcrypt('halokak');
        // $user->save();

        //Create multiple user
        $user = [
           [
            'name' => 'Admin',
            'email' => 'halo@gmail.com',
            'password'=> bcrypt('halokak'),
           ], 

           [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('halokak'),
           ]
        ];

        //insert the user into the database
        DB::table('users')->insert($user);
    }
}
