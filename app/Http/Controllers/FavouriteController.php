<?php

namespace App\Http\Controllers;

use App\Dto\Identity;
use App\Http\Requests\FavouriteRequest;
use App\Http\Traits\AuthApi;
use App\Models\Favourite;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FavouriteController extends Controller
{
    use AuthApi;

    public function index(Request $request)
    {
        $accessToken = $request->header('Authorization');

        $userInfo = Cache::has('user_info' . $accessToken) ? Cache::get('user_info' . $accessToken) : $this->getUserInfo($accessToken);

        $favourites = Favourite::where('user_id', $userInfo)->get();

        return response($favourites);
    }

    /**
     * @throws BindingResolutionException
     */
    public function store(FavouriteRequest $request)
    {

        /** @var Identity $identity */
        $identity = app()->make(Identity::class);

        print_r($identity);die;

        $favourites = Favourite::create([
            'user_id' => $identity->id,
            'book_id' => $request->book_id,
            'type' => $request->type
        ]);

        return response($favourites);
    }
}
