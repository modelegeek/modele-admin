<?php

namespace App\Api;

use App\Classes\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function details()
    {
        $user = Auth::user();

        return JsonResponse::success([], 200);
    }
}