<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group user
     * @test
     */
    public function it_can_login()
    {
        $user = create(User::class);

        $data = [
            'email'    => $user->email,
            'password' => 'secret',
        ];

        $this->post(route(''), $data)
            ->assertStatus(200)
            ->assertJson([
                'access_token'  => true,
                'token_type'    => true,
                'refresh_token' => true,
            ]);
    }
}
