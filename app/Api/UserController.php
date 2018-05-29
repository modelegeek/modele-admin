<?php

namespace App\Api;

use App\Classes\JsonResponse;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Service\UserService;
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
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(User $user)
    {
        $developerMsg = 'Success';
        $userMsg = 'Success';

        return JsonResponse::success($developerMsg, $userMsg, $user, 200);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        try {
            (new UserService)->save($request);
        } catch (\Exception $e) {
            // error message
        }

        $developerMsg = 'Success';
        $userMsg = 'Created Successfully';

        return JsonResponse::success($developerMsg, $userMsg, 200);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            (new UserService($user))->save($request);
        } catch (\Exception $e) {

        }

        $developerMsg = 'Success';
        $userMsg = 'Updated Successfully';

        return JsonResponse::success($developerMsg, $userMsg, 200);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {

        }


        $developerMsg = 'Success';
        $userMsg = 'Deleted Successfully';

        return JsonResponse::success($developerMsg, $userMsg, 200);
    }
}
