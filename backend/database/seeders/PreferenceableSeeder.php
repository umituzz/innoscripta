<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
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

        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 1]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 2]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 3]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 4]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 5]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 6]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 7]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 8]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 9]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Category::class, 'preferenceable_id' => 10]);

        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 1]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 2]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 3]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 4]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 5]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 6]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 7]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 8]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 9]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 10]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 11]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 12]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 13]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 14]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 15]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 16]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 17]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 18]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 19]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 20]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 21]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 22]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 23]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 24]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 25]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 26]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 27]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 28]);
        Preferenceable::create(['user_id' => 1, 'preferenceable_type' => Author::class, 'preferenceable_id' => 29]);
    }
}
