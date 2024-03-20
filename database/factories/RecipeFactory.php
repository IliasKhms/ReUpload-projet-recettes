<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($this->faker));
        $title = $this->faker->numerify($this->faker->foodName() . ' ###');

        return [
            //
            'owner_id' => \App\Models\User::factory(),
            'title' => $title,
            'content' => $this->faker->realText($maxNbChar = 1000, $indexSize = 2), // $this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),
            'ingredients' => $this->faker->vegetableName() . ", " . $this->faker->meatName(),
            'price' => $this->faker->words($nb = 1, $asText = true),
            'url' => str_replace(' ', '-', $title),
            'tags' => $this->faker->words($nb = 3, $asText = true),
            'status' => 'published',
        ];
    }
}
