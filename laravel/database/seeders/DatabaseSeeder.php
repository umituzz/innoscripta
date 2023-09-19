<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            ModelHasRoleSeeder::class,
            RoleHasPermissionSeeder::class,
            SettingSeeder::class,
            CategorySeeder::class,
            SourceSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
