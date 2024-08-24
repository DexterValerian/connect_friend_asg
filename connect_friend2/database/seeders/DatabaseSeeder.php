<?php

namespace Database\Seeders;

use App\Models\AvatarModel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        DB::table('avatar')->insert([
            'img_url' => '1.jpeg',
            'price' => 50,
        ]);

        DB::table('avatar')->insert([
            'img_url' => '2.jpg',
            'price' => 10000,
        ]);

        DB::table('avatar')->insert([
            'img_url' => '3.jpeg',
            'price' => 20000,
        ]);

        DB::table('avatar')->insert([
            'img_url' => '4.jpg',
            'price' => 50000,
        ]);


    }
}
