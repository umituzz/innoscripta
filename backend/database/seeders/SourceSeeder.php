<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

/**
 * Class SourceSeeder
 * @package Database\Seeders
 */
class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Source::factory()->create();

        Source::create(['name' => 'Guardian API']);
        Source::create(['name' => 'News API']);
        Source::create(['name' => 'Media Stack API']);
        Source::create(['name' => 'Newyork Times API']);
    }
}
