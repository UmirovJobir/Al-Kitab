<?php

namespace Database\Seeders;

use App\Models\Abook;
use App\Models\AbookAudio;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Ebook;
use App\Models\EbookContent;
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
//                    ['image' => 'book1_image2.jpg', 'order' => 2],
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
                        'filename' => 'book',
                        'ebook_content' => [
                            [
                                'title' => 'I. Chorsudagi choyxona',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 1,
                            ],
                            [
                                'title' => 'II. Chorsudagi choyxona 2',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 4,
                            ],
                            [
                                'title' => 'III. Chorsudagi choyxona 2',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 8,
                            ]
                        ]
                    ],
                ],
                'abook' => [
                    [
                        'is_free' => true,
                        'price' => 10000,
                        'discount' => 0,
                        'abook_audio' => [
                            [
                                'name' => 'Abook 1, Sample Audio 1',
                                'description' => 'Description of Sample Audio 1',
                                'is_free' => true,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_1.mp3',
                                'duration' => 180,
                                'order' => 1,
                                'is_active' => true
                            ],
                            [
                                'name' => 'Abook 1, Sample Audio 2',
                                'description' => 'Description of Sample Audio 2',
                                'is_free' => true,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_2.mp3',
                                'duration' => 160,
                                'order' => 2,
                                'is_active' => true
                            ],
                            [
                                'name' => 'Abook 1, Sample Audio 3',
                                'description' => 'Description of Sample Audio 3',
                                'is_free' => true,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_3.mp3',
                                'duration' => 200,
                                'order' => 3,
                                'is_active' => true
                            ],
                        ]
                    ],
                ],
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
                        'filename' => 'book',
                        'ebook_content' => [
                            [
                                'title' => 'I. Chorsudagi choyxona',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 1,
                            ],
                            [
                                'title' => 'II. Chorsudagi choyxona 2',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 4,
                            ],
                            [
                                'title' => 'III. Chorsudagi choyxona 2',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 8,
                            ]
                        ]
                    ],
                ],
                'abook' => [
                    [
                        'is_free' => false,
                        'price' => 10000,
                        'discount' => 10,
                        'abook_audio' => [
                            [
                                'name' => 'Abook 2, Sample Audio 1',
                                'description' => 'Description of Sample Audio ',
                                'is_free' => false,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_1.mp3',
                                'duration' => 180,
                                'order' => 1,
                                'is_active' => true
                            ],
                            [
                                'name' => 'Abook 2, Sample Audio 2',
                                'description' => 'Description of Sample Audio 2',
                                'is_free' => false,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_2.mp3',
                                'duration' => 160,
                                'order' => 2,
                                'is_active' => true
                            ],
                            [
                                'name' => 'Abook 2, Sample Audio 3',
                                'description' => 'Description of Sample Audio 3',
                                'is_free' => false,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_3.mp3',
                                'duration' => 200,
                                'order' => 3,
                                'is_active' => true
                            ],
                        ]
                    ],
                ],
            ],
            [
                'pid' => 33333,
                'category_id' => [2, 3],
                'author_id' => Author::first()->id,
                'publisher_id' => Publisher::first()->id,
                'language' => 'en',
                'name' => 'Book 1',
                'description' => 'Lorem ipsum dolor sit amet',
                'is_available' => true,
                'rating' => 2.5,
                'images' => [
                    ['image' => 'book3_image1.jpg', 'order' => 1],
                    ['image' => 'book3_image2.jpg', 'order' => 2],
                ],
                'pbook' => [
                    [
                        'is_free' => true,
                        'price' => 5000,
                        'discount' => 10,
                        'pages' => 200,
                        'cover_type' => 'Hardcover',
                        'format' => 'A4',
                    ],
                ],
                'ebook' => [
                    [
                        'is_free' => true,
                        'price' => 6000,
                        'discount' => 5,
                        'filename' => 'book',
                        'ebook_content' => [
                            [
                                'title' => 'I. Chorsudagi choyxona',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 1,
                            ],
                            [
                                'title' => 'II. Chorsudagi choyxona 2',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 4,
                            ],
                            [
                                'title' => 'III. Chorsudagi choyxona 2',
                                'content' => 'Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди. Қаппайган конвертларни очиб кўрдиму тарвузим қўлтиғимдан тушиб, оёқ-қўлим шалвираб қолди. Жавобларнинг бирида силлиққина қилиб: "қаламингиз анча чархланган кўринади, ўз устингизда қаттиқроқ ишласангиз, сиздан ёзувчи чиқиши мумкин" дейилган бўлса ҳам, дилим ёришмади. Бунақа жавобларнинг мазмунига тушуниб қолганман. "Ҳикоянг ярамайди" деб дангал ёзишмайдию, тасалли бериб, кўнгил кўтариб қўйишади. Мухлисларга ёзилган Шундай қилиб, яна учта журналдан ҳикояларим "эсон-омон" қайтиб келди.',
                                'page' => 8,
                            ]
                        ]
                    ],
                ],
                'abook' => [
                    [
                        'is_free' => false,
                        'price' => 20000,
                        'discount' => 10,
                        'abook_audio' => [
                            [
                                'name' => 'Abook 3, Sample Audio 1',
                                'description' => 'Description of Sample Audio ',
                                'is_free' => false,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_1.mp3',
                                'duration' => 180,
                                'order' => 1,
                                'is_active' => true
                            ],
                            [
                                'name' => 'Abook 3, Sample Audio 2',
                                'description' => 'Description of Sample Audio 2',
                                'is_free' => false,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_2.mp3',
                                'duration' => 160,
                                'order' => 2,
                                'is_active' => true
                            ],
                            [
                                'name' => 'Abook 3, Sample Audio 3',
                                'description' => 'Description of Sample Audio 3',
                                'is_free' => false,
                                'host' => 'example.com',
                                'filename' => 'sample_audio_3.mp3',
                                'duration' => 200,
                                'order' => 3,
                                'is_active' => true
                            ],
                        ]
                    ],
                ],
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
                $ebook = Ebook::create([
                    'id' => $book->id,
                    'is_free' => $ebookData['is_free'],
                    'price' => $ebookData['price'],
                    'discount' => $ebookData['discount'],
                    'filename' => $ebookData['filename'],
                ]);

                foreach ($ebookData['ebook_content'] as $contentData) {
                    EbookContent::create([
                        'ebook_id' => $ebook->id,
                        'title' => $contentData['title'],
                        'content' => $contentData['content'],
                        'page' => $contentData['page'],
                    ]);
                }
            }

            foreach ($bookData['abook'] as $abookData) {
                $abook = Abook::create([
                    'id' => $book->id,
                    'is_free' => $ebookData['is_free'],
                    'price' => $ebookData['price'],
                    'discount' => $ebookData['discount'],
                ]);

                foreach ($abookData['abook_audio'] as $abookAudioData) {
                    AbookAudio::create([
                        'id' => Uuid::uuid4()->toString(),
                        'abook_id' => $abook->id,
                        'name' => $abookAudioData['name'],
                        'description' => $abookAudioData['description'],
                        'is_free' => $abookAudioData['is_free'],
                        'host' => $abookAudioData['host'],
                        'filename' => $abookAudioData['filename'],
                        'duration' => $abookAudioData['duration'],
                        'order' => $abookAudioData['order'],
                        'is_active' => $abookAudioData['is_active']
                    ]);
                }
            }
        }
    }
}
