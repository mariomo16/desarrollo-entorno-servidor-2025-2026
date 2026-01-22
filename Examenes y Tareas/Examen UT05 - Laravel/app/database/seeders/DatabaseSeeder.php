<?php

namespace Database\Seeders;

use App\Models\Zulo;
use App\Models\Especulador;
use App\Models\User;
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
        Especulador::factory(10)->create();
        User::factory(10)->create();
        Zulo::factory(10)->create();
    }
}
