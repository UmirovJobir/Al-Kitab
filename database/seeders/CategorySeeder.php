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
        $rootCategory = Category::create([
            'slug' => 'root-category',
            'icon' => 'fa-folder',
            'name' => 'Root Category',
            'order' => 1,
            'is_active' => true,
        ]);

        $categories = [
            [
                'slug' => 'category-1',
                'icon' => 'fa-cogs',
                'name' => 'Category 1',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'slug' => 'category-2',
                'icon' => 'fa-desktop',
                'name' => 'Category 2',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $categoryData) {
            $categoryData['parent_id'] = $rootCategory->id;

            Category::create($categoryData);
        }
    }
}
