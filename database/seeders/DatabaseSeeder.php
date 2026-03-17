<?php

namespace Database\Seeders;

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
        $this->call([
            ProductSeeder::class
        ]);
        // User::factory(10)->create();

    //     User::updateOrCreate(
    // ['email' => 'admin@gmail.com'], // Lo busca por email
    // ['name' => 'Test User', 'password' => bcrypt('password')] // Si lo encuentra lo actualiza, si no, lo crea
// );
    }
}