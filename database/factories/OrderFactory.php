<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderDetail;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = \App\Models\Product::factory()->create();
        return [
            'quantity' => $this->faker->numberBetween(1, 10),
            'subtotal' => $this->faker->randomFloat(2, 10, 1000),
            'registered_by' => $this->faker->name,
            'product_id' =>  \App\Models\Product::factory(),
            'order_id' => function () {
                return Order::factory()->create()->id;
            },
        ];
    }
}