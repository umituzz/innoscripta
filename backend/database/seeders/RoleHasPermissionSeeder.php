<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleHasPermissionSeeder
 * @package Database\Seeders
 */
class RoleHasPermissionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('role_has_permissions')->insert([
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 1, 'permission_id' => 2],
            ['role_id' => 1, 'permission_id' => 3],
            ['role_id' => 1, 'permission_id' => 4],
        ]);
    }
}
