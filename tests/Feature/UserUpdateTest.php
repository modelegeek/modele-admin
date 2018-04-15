<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserUpdateTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function update_detail()
    {
        $loginResponse = $this->signIn();

        $user = create(User::class);

        $data = [
            'name'     => "Josh",
            'email'    => "joshua@gmail.com",
            'password' => bcrypt("111111"),
        ];

        $this->patch(route('user.update', ['user' => $user->id]), $data, $loginResponse['headers'])
            ->assertStatus(200)
            ->assertJson([
                'user_message' => true,
            ]);
    }
}
