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
            'title' => "Annonce $i",
            'description' => "Description de l'annonce $i",
            'price' => rand(1000, 5000),
            'nbRome' => rand(1, 5),
            'surface' => rand(50, 200),
            'city' => 'Ville',
            'adresse' => "Adresse de l'annonce $i",
            'userId' => 1
          ]);
      }
  }
    }

