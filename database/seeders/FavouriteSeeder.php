<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavouriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('favourites')->insert([
            'user_id' => 'c43d6599-294e-47ff-b51c-e5eef8b21eef',
            'book_id' => Book::first()->id,
            'type' => 'pbook',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
