<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(['name' => 'Ação']);
        Genre::create(['name' => 'Ficção']);
        Genre::create(['name' => 'Aventura']);
        Genre::create(['name' => 'Drama']);
        Genre::create(['name' => 'Comédia']);
        Genre::create(['name' => 'Fantasia']);
    }
}
