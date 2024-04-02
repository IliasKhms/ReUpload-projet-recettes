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
        $this->faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($this->faker));
        $title = $this->faker->numerify($this->faker->foodName(). ' ###');

        return [
            'idrecipe' => $this->faker->numberBetween(1, 10),
            'ingredients' => $this->faker->vegetableName()
        ];
    }
}
