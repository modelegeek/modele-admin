<?php


namespace App\Api\Auth;

use App\Classes\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Container\Container;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\PersonalAccessTokenFactory;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | return a token of jwt to access the app. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $this->username() => [Lang::get('auth.throttle', ['seconds' => $seconds])],
        ])->status(429);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $user = User::where('email', $request->email)->first();
        $user->token = $user->createToken('authenticated')->accessToken;

        $developerMsg = 'Success';
        $userMsg = 'You login successfully';

        return JsonResponse::success($developerMsg, $userMsg, $user, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $developerMsg = 'Validation error';
        $userMsg = 'These credentials do not match our records';
        $errorCode = '400';

        return JsonResponse::validateError($developerMsg, $userMsg, $errorCode);

    }

}
