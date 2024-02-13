<?php

namespace Database\Seeders;

use App\Models\Abook;
use App\Models\Basket;
use App\Models\Ebook;
use App\Models\Order;
use App\Models\Pbook;
use App\Models\SoldCount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'user_id' => 'c43d6599-294e-47ff-b51c-e5eef8b21eef',
                'amount' => 100,
                'state' => 1,
                'baskets' => [
                    [
                        'book_id' => Pbook::first()->id,
                        'type' => 'pbook',
                        'quantity' => 2,
                        'price' => 50,
                        'discount' => 10,
                    ],
                    [
                        'book_id' => Pbook::first()->id,
                        'type' => 'pbook',
                        'quantity' => 1,
                        'price' => 25000,
                        'discount' => 5,
                    ],
                ],
            ],
            [
                'user_id' => 'c43d6599-294e-47ff-b51c-e5eef8b21eef',
                'amount' => 150,
                'state' => 2,
                'baskets' => [
                    [
                        'book_id' => Ebook::first()->id,
                        'type' => 'ebook',
                        'quantity' => 3,
                        'price' => 25000,
                        'discount' => 0,
                    ],
                ],
            ],
        ];

        foreach ($orders as $orderData) {
            $order = Order::create([
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $orderData['user_id'],
                'amount' => $orderData['amount'],
                'state' => $orderData['state']
            ]);

            foreach ($orderData['baskets'] as $basketData) {
                $basketData['order_id'] = $order->id;
                Basket::create($basketData);

                $soldCount = SoldCount::where('book_id', $basketData['book_id'])
                    ->where('type', $basketData['type'])
                    ->first();
                if ($soldCount) {
                    $soldCount->update([
                        'quantity' => $soldCount->quantity + $basketData['quantity']
                    ]);
                } else {
                    SoldCount::create([
                        'book_id' => $basketData['book_id'],
                        'type' => $basketData['type'],
                        'quantity' => $basketData['quantity'],
                    ]);
                }
            }
        }
    }
}
