<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRegisterTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_can_register()
    {
        $user = create('App\Models\User', [
            'password' => bcrypt('111111'),
        ]);

        $data = [
            'email'    => $user->email,
            'password' => '111111',
        ];

        $this->post('/api/login', $data)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'token' => true,
                ],
            ]);
    }
}
