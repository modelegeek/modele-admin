<?php

namespace App\Api;

use App\Classes\JsonResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UserService;
use Yajra\DataTables\Facades\DataTables;

class UserController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index()
    {
        $model = User::query();

        $users = DataTables::eloquent($model)->toArray();

        return response()->json($users);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(User $user)
    {
        $developerMsg = 'Success';
        $userMsg = 'Success';

        return JsonResponse::success($developerMsg, $userMsg, $user, 200);
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $developerMsg = 'Success';
        $userMsg = 'Created Successfully';

        return JsonResponse::success($developerMsg, $userMsg, 200);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
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
