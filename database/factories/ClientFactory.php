<?php

namespace Database\Factories;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'document' => $this->faker->unique()->randomNumber(8),
            'photo' => $this->faker->imageUrl(200, 200, 'people'), 
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'registered_by' => $this->faker->name,
        ];
    }
}
