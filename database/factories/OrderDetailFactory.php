<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_order' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'total' => $this->faker->randomFloat(2, 100, 1000),
            'route' => $this->faker->address,
            'status' => $this->faker->randomElement(['pending', 'completed', 'shipped']),
            'registered_by' => $this->faker->name,
            'client_id' =>  \App\Models\Client::factory(),
        ];
    }
}
