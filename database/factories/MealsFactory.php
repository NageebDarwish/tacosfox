<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meals>
 */
class MealsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(40),
            'currency' => $this->faker->text(5),
            'price' => $this->faker->randomNumber(),
            'menu_id' => $this->faker->numberBetween(1, 7),
            'image' => $this->faker->imageUrl(640, 480)
        ];
    }
}
