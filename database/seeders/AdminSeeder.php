<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
// Hash function is the one that encrypted the password. ! it is important 
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert to admin table bcause we are not going to use the regiester form
        // the Admin will have the ability to add and delete the users on it is own
        User::create([
            'email' => 'admin@gmail.com',
            'isAdmin' => true,
            'password' => Hash::make('admin1234')
        ]);
    }
}
