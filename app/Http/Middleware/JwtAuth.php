<?php

namespace App\Http\Middleware;

use App\Dto\Identity;
use App\Dto\JwtPayload;
use App\Dto\User;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Yiisoft\Hydrator\Hydrator;

class JwtAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = $request->header('Authorization');

        try {
            $payload = JWT::decode($accessToken, new Key($_ENV['SERVICE_SECRET'], 'HS256'));
        } catch (UnauthorizedException $exception) {
            throw new UnauthorizedException();
        }

        $payload = (new Hydrator())->create(JwtPayload::class, (array)$payload);

        if (($payload->iat + $payload->lifetime) < time()) {
            throw new UnauthorizedException();
        }

        app()->bind(Identity::class, function () use ($payload) {
            return $payload->Identity;
        });

        app()->bind(User::class, function () use ($payload) {
            return $payload->User;
        });

        return $next($request);
    }
}
