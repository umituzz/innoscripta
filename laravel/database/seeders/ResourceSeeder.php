<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

/**
 * Class SettingSeeder
 * @package Database\Seeders
 */
class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Resource::factory()->create();

        Resource::create(['name' => 'Guardian API']);
        Resource::create(['name' => 'News API']);
        Resource::create(['name' => 'Media Stack API']);
    }
}
