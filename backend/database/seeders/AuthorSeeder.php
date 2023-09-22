<?php

namespace Database\Seeders;

use App\Enums\AuthorEnums;
use App\Models\Author;
use Illuminate\Database\Seeder;

/**
 * Class AuthorSeeder
 * @package Database\Seeders
 */
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Author::factory()->create();

        Author::create(['source_id' => 1, 'name' => AuthorEnums::GUARDIAN_AUTHOR]);
        Author::create(['source_id' => 2, 'name' => AuthorEnums::NEWS_AUTHOR]);
        Author::create(['source_id' => 3, 'name' => AuthorEnums::MEDIA_STACK_AUTHOR]);
    }
}
