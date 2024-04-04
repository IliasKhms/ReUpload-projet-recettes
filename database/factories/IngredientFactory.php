<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class IngredientFactory extends Factory
{
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
    {
        $type = $this->faker->randomElement(['grammes', 'Cuillère(s) à soupe', 'Cuillère(s) à café', 'verre(s)']);
        $quantity = ($type === 'grammes') ? $this->faker->numberBetween(50, 1000) : $this->faker->numberBetween(1, 5);

        return [
            'idrecipe' => $this->faker->numberBetween(1, 10),
            'ingredients' => $this->faker->vegetableName(),
            'type' => $type,
            'quantitee' => $quantity,
        ];
    }

}
