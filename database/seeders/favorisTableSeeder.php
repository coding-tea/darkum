<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class favorisTableSeeder extends Seeder
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
            array_push($data, ['idUser' => $i, 'idPost' => $i]);
        }
        DB::table('favoris')->insert($data);
    }
}
