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

     //$title = $this->faker->sentence($nbWords = 6, $variableNbWords = true);
    $title = $this->faker->company();

     return [
         'owner_id' => \App\Models\User::factory(),
         'title' => $title,
         'content' => $this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),
         'ingredients' => $this->faker->catchPhrase(),
         'price' => $this->faker->words($nb = 1, $asText = true),
         'url' => str_replace(' ', '-', $title),
         'tags' => $this->faker->words($nb = 3, $asText = true),
         'status' => 'published',
     ];
 }
}
