<?php

namespace Database\Seeders;

use App\Models\Publisher;
use App\Models\PublisherInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;


class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishersWithInfo = [
            [
                'logo' => 'publisher1_logo.jpg',
                'info' => [
                    'en' => [
                        'language' => 'en',
                        'name' => 'Publisher 1',
                        'info' => 'Lorem ipsum dolor sit amet in English.',
                    ],
                    'ru' => [
                        'language' => 'ru',
                        'name' => 'Издатель 1',
                        'info' => 'Lorem ipsum dolor sit amet in Russian.',
                    ],
                    'uz' => [
                        'language' => 'uz',
                        'name' => 'Nashriyot 1',
                        'info' => 'Lorem ipsum dolor sit amet in Uzbek.',
                    ],
                ],
            ],
            [
                'logo' => 'publisher2_logo.jpg',
                'info' => [
                    'en' => [
                        'language' => 'en',
                        'name' => 'Publisher 2',
                        'info' => 'Sed do eiusmod tempor incididunt in English.',
                    ],
                    'ru' => [
                        'language' => 'ru',
                        'name' => 'Издатель 2',
                        'info' => 'Sed do eiusmod tempor incididunt in Russian.',
                    ],
                    'uz' => [
                        'language' => 'uz',
                        'name' => 'Nashriyot 2',
                        'info' => 'Sed do eiusmod tempor incididunt in Uzbek.',
                    ],
                ],
            ],
        ];

        foreach ($publishersWithInfo as $publisherData) {
            $publisher = Publisher::create([
                'id' => Uuid::uuid4()->toString(),
                'logo' => $publisherData['logo'],
            ]);

            foreach ($publisherData['info'] as $language => $infoData) {
                PublisherInfo::create([
                    'publisher_id' => $publisher->id,
                    'language' => $infoData['language'],
                    'name' => $infoData['name'],
                    'info' => $infoData['info'],
                ]);
            }
        }
    }
}
