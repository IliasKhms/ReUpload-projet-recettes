<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Recipe::factory()
    ->count(5)
    ->for(\App\Models\User::factory()->create())
    ->create();


\App\Models\Recipe::factory()
    ->count(5)
    ->for(\App\Models\User::factory()->create())
    ->create();
    }
}
