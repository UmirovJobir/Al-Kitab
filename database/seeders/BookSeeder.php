<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Ebook;
use App\Models\Pbook;
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
        $books  = [
            [
                'pid' => 11111,
                'category_id' => [1, 2],
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
                'pbook' => [
                    [
                        'is_free' => true,
                        'price' => 10000,
                        'discount' => 10,
                        'pages' => 200,
                        'cover_type' => 'Hardcover',
                        'format' => 'A4',
                    ],
                ],
                'ebook' => [
                    [
                        'is_free' => true,
                        'price' => 11000,
                        'discount' => 5,
                        'filename' => 'music1.mp3',
                    ],
                ]
            ],
            [
                'pid' => 22222,
                'category_id' => [1],
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
                'pbook' => [
                    [
                        'is_free' => false,
                        'price' => 25000,
                        'discount' => 5,
                        'pages' => 300,
                        'cover_type' => 'Paperback',
                        'format' => 'A5',
                    ],
                ],
                'ebook' => [
                    [
                        'is_free' => true,
                        'price' => 15000,
                        'discount' => 15,
                        'filename' => 'music2.mp3',
                    ],
                ]
            ],
        ];

        foreach ($books as $bookData) {;
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

            $book->categories()->sync($bookData['category_id']);

            foreach ($bookData['images'] as $imageData) {
                BookImage::create([
                    'book_id' => $book->id,
                    'image' => $imageData['image'],
                    'order' => $imageData['order'],
                ]);
            }

            foreach ($bookData['pbook'] as $pbookData) {
                Pbook::create([
                    'id' => $book->id,
                    'is_free' => $pbookData['is_free'],
                    'price' => $pbookData['price'],
                    'discount' => $pbookData['discount'],
                    'pages' => $pbookData['pages'],
                    'cover_type' => $pbookData['cover_type'],
                    'format' => $pbookData['format'],
                ]);
            }

            foreach ($bookData['ebook'] as $ebookData) {
                Ebook::create([
                    'id' => $book->id,
                    'is_free' => $ebookData['is_free'],
                    'price' => $ebookData['price'],
                    'discount' => $ebookData['discount'],
                    'filename' => $ebookData['filename'],
                ]);
            }
        }
    }
}