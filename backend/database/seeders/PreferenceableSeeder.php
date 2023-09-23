<?php

namespace Database\Seeders;

use App\Models\Preferenceable;
use App\Models\Source;
use Illuminate\Database\Seeder;

/**
 * Class PreferenceableSeeder
 * @package Database\Seeders
 */
class PreferenceableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Source::class, 'preferenceable_id' => 1]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Source::class, 'preferenceable_id' => 2]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Source::class, 'preferenceable_id' => 3]);
    }
}
