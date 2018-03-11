<?php

namespace App\Api;


use Illuminate\Support\Facades\Auth;

class UserController
{
    public function details()
    {
        dd(Auth::user());
    }
}