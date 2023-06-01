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
      '1685630488back3.jpg',
      '1685630298back1.jpg',
      '1685630298back2.jpg'
    ];

    for ($i = 1; $i <= 40; $i++) {
      DB::table('medias')->insert([
        'url' => $imageUrls[array_rand($imageUrls)],
        'idAnnounce' => $i,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}
