<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        Category::insert([
            ['name' => 'Bangunan'],
            ['name' => 'Tanah'],
            ['name' => 'Perkantoran'],
            ['name' => 'Sarana Olahraga'],
        ]);
    }
}
