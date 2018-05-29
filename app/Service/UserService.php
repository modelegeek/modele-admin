<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    private $user;

    /**
     * UserService constructor.
     * @param User|null $user
     */
    public function __construct(User $user = null)
    {
        $this->user = $user ?? new User();
    }

    /**
     * @param Request $request
     */
    public function save(Request $request)
    {
        $user = $this->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
    }
}
