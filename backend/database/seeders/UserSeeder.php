<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create(['name' => 'Ümit UZ', 'email' => 'umituz9999@gmail.com', 'password' => bcrypt(123456789)]);
        User::create(['name' => 'Admin', 'email' => 'admin@innoscripta.com', 'password' => bcrypt(123456789)]);
        User::create(['name' => 'User', 'email' => 'user@innoscripta.com', 'password' => bcrypt(123456789)]);
    }
}
