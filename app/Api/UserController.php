<?php

namespace App\Api;

use App\Classes\JsonResponse;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use UserService;

class UserController
{
    public function index()
    {
        $users = User::all();

        $developerMsg = 'Success';
        $userMsg = 'Success';

        return JsonResponse::success($developerMsg, $userMsg, $users, 200);
    }

    public function edit()
    {
        $user = Auth::user();

        $developerMsg = 'Success';
        $userMsg = 'Success';

        return JsonResponse::success($developerMsg, $userMsg, $user, 200);
    }

    public function store(Request $request)
    {
        User::create($request->all());

        $developerMsg = 'Success';
        $userMsg = 'Created Successfully';

        return JsonResponse::success($developerMsg, $userMsg, 200);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $developerMsg = 'Success';
        $userMsg = 'Updated Successfully';

        return JsonResponse::success($developerMsg, $userMsg, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        $developerMsg = 'Success';
        $userMsg = 'Deleted Successfully';

        return JsonResponse::success($developerMsg, $userMsg, 200);
    }
}