<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $booksWithImages  = [
            [
                'pid' => 11111,
                'author_id' => Author::first()->id,
                'publisher_id' => Publisher::first()->id,
                'language' => 'en',
                'name' => 'Book 1',
                'description' => 'Lorem ipsum dolor sit amet',
                'is_available' => true,
                'rating' => 4.5,
                'images' => [
                    ['image' => 'book1_image1.jpg', 'order' => 1],
                    ['image' => 'book1_image2.jpg', 'order' => 2],
                ],
            ],
            [
                'pid' => 2,
                'author_id' => Author::first()->id,
                'publisher_id' => Publisher::first()->id,
                'language' => 'ru',
                'name' => 'Книга 2',
                'description' => 'Сед do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'is_available' => true,
                'rating' => 3.8,
                'images' => [
                    ['image' => 'book2_image1.jpg', 'order' => 1],
                    ['image' => 'book2_image2.jpg', 'order' => 2],
                ],
            ],
        ];

        foreach ($booksWithImages as $bookData) {;
            $book = Book::create([
                'id' => Uuid::uuid4()->toString(),
                'pid'          => $bookData['pid'],
                'author_id'    => $bookData['author_id'],
                'publisher_id' => $bookData['publisher_id'],
                'language'     => $bookData['language'],
                'name'         => $bookData['name'],
                'description'  => $bookData['description'],
                'is_available' => $bookData['is_available'],
                'rating'       => $bookData['rating']
            ]);

            foreach ($bookData['images'] as $imageData) {
                BookImage::create([
                    'book_id' => $book->id,
                    'image' => $imageData['image'],
                    'order' => $imageData['order'],
                ]);
            }
        }
    }
}
