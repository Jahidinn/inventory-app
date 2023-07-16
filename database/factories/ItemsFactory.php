<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2, 8)),
            'category_id' => mt_rand(1, 5),
            'user_id' => mt_rand(1, 3),
            'measuring_unit_id' => mt_rand(1, 3),
            'item_id' => fake()->unique()->userName(),
            'description' => $this->faker->paragraph(),
            'price' => mt_rand(1000, 5000)
        ];
    }
}
