<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            array_push(
                $data,
                [
                    'nomComplet' => Str::random(10),
                    'email' => Str::random(8),
                    'password' => Str::random(5),
                    'tel' => Str::random(10),
                    'adresse' => Str::random(20),
                    'retrievePassword' => Str::random(8)
                ]
            );
        }
        DB::table('users')->insert($data);
    }
}
