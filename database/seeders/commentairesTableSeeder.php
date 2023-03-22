<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class commentairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i=1; $i<10; $i++)
        {
            array_push($data, ['commentaire' => Str::random(10), 'idUser' => $i, 'idPost' => $i]);
        }
        DB::table('commentaires')->insert($data);
    }
}
