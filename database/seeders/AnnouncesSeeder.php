<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();

      for ($i = 0; $i < 10; $i++) {
          DB::table('announces')->insert([
              'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
              'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
              'typeL' => $faker->randomElement(['location', 'vente', 'vacance']),
              'type' => $faker->randomElement(['Appartement', 'Maison', 'Villa', "Chambres", "Terrains", "Fermes"]),
              'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 100000),
              'nbRome' => $faker->randomDigitNotNull(),
              'surface' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 500),
              'city' => $faker->city(),
              'userId' => 1,
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
  }
    }

