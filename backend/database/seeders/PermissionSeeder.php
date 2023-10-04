<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

/**
 * Class PermissionSeeder
 */
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Article Management']);
        Permission::create(['name' => 'User Management']);
        Permission::create(['name' => 'Notification Management']);
        Permission::create(['name' => 'Log Management']);
    }
}
