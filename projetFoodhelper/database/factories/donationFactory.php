<?php

namespace Database\Factories;

use App\Models\donation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\donation>
 */
class donationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            "description" => $this->faker->paragraph,
            'type_aliment'  => $this->faker->randomElement(['fruits', 'légumes', 'produits laitiers', 'conserves']),
            "date_limite" => $this->faker->date,
            "quantite" => $this->faker->numberBetween(1,50),
            "localisation" => $this->faker->city,
            "statut" => "nonattribue",
            "image"=> "public/img/pexels-minan1398-1093837.jpg",
            'user_id' => function () {
                return \App\Models\User::factory()->create(['role' => 'donor'])->id;
            },
        ];
    }
}
