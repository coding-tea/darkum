<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            array_push(
                $data,
                [
                    'title' => Str::random(8),
                    'description' => Str::random(8),
                    'prix' => 100,
                    'nbChambre' => $i,
                    'surface' => Str::random(10),
                    'ville' => Str::random(10)
                ]
            );
        }
        DB::table('posts')->insert($data);
    }
}
