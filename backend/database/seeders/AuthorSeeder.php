<?php

namespace Database\Seeders;

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
        Author::factory()->create();
    }
}
