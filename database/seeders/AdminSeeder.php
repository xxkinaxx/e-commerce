<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //make account for admin

        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->role = 'admin';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
