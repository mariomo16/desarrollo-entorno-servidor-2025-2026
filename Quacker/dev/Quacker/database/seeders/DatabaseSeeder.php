<?php

namespace Database\Seeders;

use function count;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Quack;
use App\Models\Quashtag;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();
        Quack::factory(50)->create();
        Quashtag::factory(30)->create();

        // Usuario de prueba para desarrollo
        User::factory()->create([
            'username' => 'admin',
            'display_name' => 'Quacker',
            'email' => 'admin@quacker.es',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin123'),
        ]);

        // Quack de prueba para desarrollo
        Quack::factory()->create([
            'user_id' => User::max('id'),
            'content' => 'Solo puedo editar y eliminar mis quacks!',
            'created_at' => now()->addSeconds(1)
        ]);

        // https://laracasts.com/discuss/channels/eloquent/how-to-seed-a-pivot-table-in-laravel
        $users = User::all();
        $quacks = Quack::all();
        foreach ($users as $user) {

            $quackIdsQuav = [];
            $quackIdsRequack = [];

            foreach ($quacks as $quack) {
                if (rand(1, 100) > 70) {
                    $quackIdsQuav[] = $quack->id;
                }

                if (rand(1, 100) > 70) {
                    $quackIdsRequack[] = $quack->id;
                }
            }

            $user->quavs()->attach($quackIdsQuav);
            $user->requacks()->attach($quackIdsRequack);
        }
    }
}
