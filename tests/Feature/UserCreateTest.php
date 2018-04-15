<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCreateTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function createUser()
    {
        $loginResponse = $this->signIn();


        $data = [
            'name'     => "Josh",
            'email'    => "joshua@gmail.com",
            'password' => bcrypt("111111"),
        ];

        $this->post(route('user.store'), $data, $loginResponse['headers'])
            ->assertStatus(200)
            ->assertJson([
                'user_message' => true,
            ]);
    }
}
