<?php

namespace App\Http\Controllers;

use App\Http\Traits\AuthApi;
use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    use AuthApi;

    public function index(Request $request)
    {
        $accessToken = $request->header('Authorization');

        $userInfo = Cache::has('user_info' . $accessToken) ? Cache::get('user_info' . $accessToken) : $this->getUserInfo($accessToken);

        $orders = Order::where('user_id', $userInfo)->with('orderPayment')->get();

        return response($orders);
    }
}
