<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\AuthorInfo;
use Ramsey\Uuid\Uuid;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorsWithInfo = [
            [
                'image' => 'author1.jpg',
                'info' => [
                    'en' => [
                        'language' => 'en',
                        'name' => 'Author 1',
                        'info' => 'Lorem ipsum dolor sit amet in English.',
                    ],
                    'ru' => [
                        'language' => 'ru',
                        'name' => 'Автор 1',
                        'info' => 'Lorem ipsum dolor sit amet in Russian.',
                    ],
                    'uz' => [
                        'language' => 'uz',
                        'name' => 'Muallif 1',
                        'info' => 'Lorem ipsum dolor sit amet in Uzbek.',
                    ],
                ],
            ],
            [
                'image' => 'author2.jpg',
                'info' => [
                    'en' => [
                        'language' => 'en',
                        'name' => 'Author 2',
                        'info' => 'Sed do eiusmod tempor incididunt in English.',
                    ],
                    'ru' => [
                        'language' => 'ru',
                        'name' => 'Автор 2',
                        'info' => 'Sed do eiusmod tempor incididunt in Russian.',
                    ],
                    'uz' => [
                        'language' => 'uz',
                        'name' => 'Muallif 2',
                        'info' => 'Sed do eiusmod tempor incididunt in Uzbek.',
                    ],
                ],
            ],
            // Add more authors with their info as needed
        ];

        foreach ($authorsWithInfo as $authorData) {
            $author = Author::create([
                'id' => Uuid::uuid4()->toString(),
                'image' => $authorData['image'],
            ]);

            foreach ($authorData['info'] as $language => $infoData) {
                AuthorInfo::create([
                    'author_id' => $author->id,
                    'language' => $infoData['language'],
                    'name' => $infoData['name'],
                    'info' => $infoData['info'],
                ]);
            }
        }
    }
}
