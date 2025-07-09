<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'car_name' => $this->faker->company . ' ' . $this->faker->word,
            'car_price' => $this->faker->numberBetween(1000, 10000),
            'description' => $this->faker->sentence(12),
            'image' => 'cars/sample-car.jpg', // Make sure this exists in public/storage/cars
            'status' => $this->faker->randomElement(['available', 'rented', 'maintenance']),
        ];
    }
}
