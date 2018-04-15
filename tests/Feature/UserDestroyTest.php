<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserDestroyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function deleteUser()
    {
        $loginResponse = $this->signIn();

        $user = create(User::class);

        $this->delete(route('user.destroy',['user' => $user->id]),[], $loginResponse['headers'])
            ->assertStatus(200)
            ->assertJson([
                'user_message' => true,
            ]);
    }
}
