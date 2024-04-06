<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,100) as $index) {
            DB::table('ratings')->insert([
                'recipe_id' => $faker->numberBetween(1, 10), // Assurez-vous que ces IDs existent dans votre table recipes
                'rating' => $faker->numberBetween(1, 5), // Generates a random integer between 1 and 5
                'created_at' => $date = $faker->dateTimeThisYear, // Generates a random date and time in the current year
                'updated_at' => $date, // Use the same date and time as created_at
            ]);
        }
        //mettre à jour la moyenne des notes
        $recipes = \App\Models\Recipe::all();
    foreach ($recipes as $recipe) {
        $averageRating = \App\Models\Rating::where('recipe_id', $recipe->id)->average('rating');
        $recipe->rate_avg = $averageRating;
        $recipe->save();
    }
    }
}
