<?php


namespace App\Api\Controllers\Auth;

use App\Classes\JsonResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends AccessTokenController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * @param ServerRequestInterface $serverRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(ServerRequestInterface $serverRequest)
    {
        // set up request as normal http request
        $request = new Request($serverRequest->getParsedBody());

        // validate request
        $this->validateLogin($request);

        // set the form request to passport format
        $serverRequest = $this->setClientRequest($serverRequest);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $authenticateToken = $this->issueToken($serverRequest);

            return $this->sendLoginResponse($request, $authenticateToken);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * @param $request
     * @return ServerRequestInterface
     */
    protected function setClientRequest(ServerRequestInterface $request)
    {
        $appClient = Client::first();

        $serverResponse = $request->getParsedBody();

        return $request->withParsedBody([
            'grant_type'    => 'password',
            'client_id'     => $appClient->id,
            'client_secret' => $appClient->secret,
            'scope'         => '*',
            'username'      => $serverResponse['email'],
            'password'      => $serverResponse['password'],
        ]);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     * @param $authenticateToken
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request, $authenticateToken)
    {
        $this->clearLoginAttempts($request);

        return $authenticateToken;
    }

    /**
     * revoke user request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // revoke user token
        $request->user()->token()->revoke();

        return JsonResponse::success(['message' => 'Logout successfully']);
    }
}

