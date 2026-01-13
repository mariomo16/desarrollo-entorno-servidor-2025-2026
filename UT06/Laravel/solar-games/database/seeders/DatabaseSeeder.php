<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Game;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Genre::factory(5)->create();
        Game::factory(20)->create();
        User::factory(5)->create();
        Review::factory(50)->create();
    }
}
