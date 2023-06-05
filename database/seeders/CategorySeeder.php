<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Filme']);
        Category::create(['name' => 'Série']);
        Category::create(['name' => 'Documentário']);
        Category::create(['name' => 'Animação']);
        Category::create(['name' => 'Biografia']);
    }
}
