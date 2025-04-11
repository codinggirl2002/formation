<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\demande;
use App\Models\donation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Créez d'abord quelques utilisateurs (donateurs et bénéficiaires)
        User::factory()->count(10)->create();
        
        // Créez des dons - ici, on en crée par exemple 15.
        donation::factory()->count(25)->create();
        
        // Créez des demandes à partir de la factory Demande (par exemple, 20 demandes)
        demande::factory()->count(5)->create();
    }
}
