<?php

namespace App\Dto;

class JwtPayload
{
    public string $sub;
    public int $iat;
    public int $lifetime;

    public Identity $Identity;
    public User $User;
}
