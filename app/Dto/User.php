<?php

namespace App\Dto;

class User
{
    public int $public_id;
    public string|null $username;
    public string|null $photo;

    public string $f_name;
    public string $l_name;
    public string|null $m_name;
    public string|null $birthday;
    public string|null $gender;
    public string $language;
    public string $created_time;
}
