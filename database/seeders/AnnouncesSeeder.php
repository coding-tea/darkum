<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
      
      // Générer 10 utilisateurs aléatoires
      $faker = \Faker\Factory::create();

      for ($i = 0; $i < 40; $i++) {
          DB::table('announces')->insert([
              'title' => $faker->sentence(4),
              'description' => $faker->paragraph,
              'typeL' => $faker->randomElement(['location', 'vente', 'vacance']),
              'type' => $faker->randomElement(['Appartement', 'Maison', 'Villa', 'Chambres', 'Terrains', 'Fermes']),
              'price' => $faker->randomFloat(2, 1000, 10000),
              'nbRome' => $faker->numberBetween(1, 5),
              'surface' => $faker->randomNumber(2),
              'city' => $faker->city,
              'adresse' => $faker->address,
              'userId' => $faker->randomElement([1, 2, 3, 4, 5]), // Remplacez [1, 2, 3, 4, 5] par les IDs des utilisateurs existants dans votre base de données
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
  }
    }

