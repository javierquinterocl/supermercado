<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl(200, 200, 'food'), // Genera una URL de imagen aleatoria
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 1000), // Precio aleatorio entre 10 y 1000 con dos decimales
            'quantity' => $this->faker->numberBetween(1, 100), // Cantidad aleatoria entre 1 y 100
            'provider_id' => \App\Models\Provider::factory(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'registered_by' => $this->faker->name,
            
        ];
    }
}
