<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'value' => fake()->numberBetween(10_000_000, 1_000_000_000_000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'location_id' => Location::inRandomOrder()->first()->id
        ];
    }
}
