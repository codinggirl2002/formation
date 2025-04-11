<?php

namespace Database\Factories;

use App\Models\donation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\demande>
 */
class demandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pour la demande, il faut un don existant et un utilisateur bénéficiaire existant.
        // On choisit aléatoirement un don et on vérifie qu'il y a au moins un utilisateur bénéficiaire.
        $donation = \App\Models\donation::inRandomOrder()->first();
        $beneficiary = \App\Models\User::where('role', 'beneficiary')->inRandomOrder()->first();
        // Si aucun bénéficiaire n'existe, on en crée un.
        if (!$beneficiary) {
            $beneficiary = \App\Models\User::factory()->create(['role' => 'beneficiaire']);
        }
        return [
            'donation_id'  => $donation->id,
            'user_id'      => $beneficiary->id,
            'type_aliment' => $this->faker->randomElement(['fruits', 'légumes', 'produits laitiers', 'conserves']),
            "quantite" => $this->faker->numberBetween(1,50),
            "localisation" => $this->faker->city,
            "attribue" => false,
        ];
    }
}
