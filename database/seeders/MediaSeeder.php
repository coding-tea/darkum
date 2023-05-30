<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $imageUrls = [
      'img/landing_page/background/back1.jpg',
      'img/landing_page/background/back2.jpg',
      'img/landing_page/background/back3.jpg'
    ];

    for ($i = 1; $i <= 10; $i++) {
      DB::table('medias')->insert([
        'url' => "1685115995back4.jpg",
        'idAnnounce' => $i,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}
