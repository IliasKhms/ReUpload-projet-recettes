<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('commentaires')->insert([
                'pseudo' => $faker->name,
                'content' => $faker->text,
                'recipe_id' => $faker->numberBetween(1, 10), // Assurez-vous que ces IDs existent dans votre table recipes
            ]);
        }
    }
}
