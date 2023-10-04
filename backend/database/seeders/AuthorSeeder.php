<?php

namespace Database\Seeders;

use App\Enums\AuthorEnums;
use App\Models\Author;
use Illuminate\Database\Seeder;

/**
 * Class AuthorSeeder
 */
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //        Author::factory()->create();

        Author::create(['name' => AuthorEnums::GUARDIAN_AUTHOR]);
        Author::create(['name' => AuthorEnums::NEWS_AUTHOR]);
        Author::create(['name' => AuthorEnums::MEDIA_STACK_AUTHOR]);
    }
}
