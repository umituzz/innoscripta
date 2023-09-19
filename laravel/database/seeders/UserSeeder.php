<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 * @package Database\Seeders
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create(['name' => 'Admin', 'email' => 'admin@laravelreact.com', 'password' => bcrypt(123456789)]);
        User::create(['name' => 'User', 'email' => 'user@laravelreact.com', 'password' => bcrypt(123456789)]);
    }
}
