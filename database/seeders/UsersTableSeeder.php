<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      for ($i = 0; $i < 20; $i++) {
          DB::table('users')->insert([
              'name' => $faker->name,
              'email' => $faker->unique()->safeEmail,
              'email_verified_at' => now(),
              'password' => Hash::make('password'),
              'remember_token' => Str::random(10),
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}
