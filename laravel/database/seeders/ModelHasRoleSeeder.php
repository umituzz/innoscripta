<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => User::class,
                'model_id' => 1
            ],
            [
                'role_id' => 2,
                'model_type' => User::class,
                'model_id' => 2
            ]
        ]);
    }
}
