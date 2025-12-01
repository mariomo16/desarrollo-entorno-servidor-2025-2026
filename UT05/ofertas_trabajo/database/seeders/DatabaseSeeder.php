<?php

namespace Database\Seeders;

use App\Models\InformacionFiscal;
use App\Models\Oferta;
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
        InformacionFiscal::factory(10)->create();
        $ofertas = Oferta::factory(100)->create();
        $users = User::factory(10)->create();

        foreach($ofertas as $oferta) {
            $candidatos = $users->random(5);
            $oferta->candidatos()->attach($candidatos);
        }
    }
}
