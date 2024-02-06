<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bannersData = [
            [
                'description' => 'Banner 1 Description',
                'language' => 'en',
                'link' => 'https://example.com/banner1',
                'image' => 'banner1.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'description' => 'Banner 2 Description',
                'language' => 'ru',
                'link' => 'https://example.com/banner2',
                'image' => 'banner2.jpg',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($bannersData as $data) {
            Banner::create($data);
        }
    }
}
