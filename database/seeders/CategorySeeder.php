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
        $categories = [
            ['name' => 'Food', 'color' => '#ef4444'],
            ['name' => 'Transport', 'color' => '#3b82f6'],
            ['name' => 'Shopping', 'color' => '#10b981'],
            ['name' => 'Others', 'color' => '#f59e0b'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
