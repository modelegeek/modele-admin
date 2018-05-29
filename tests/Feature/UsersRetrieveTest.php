<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UsersRetrieveTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group user
     *
     * @test
     */
    public function it_can_get_all_detail()
    {
        $loginResponse = $this->signIn();

        $users = User::all()->toArray();

        $this->get(route('user.index'), $loginResponse['headers'])
            ->assertStatus(200)
            ->assertJson([
                'data' => $users,
            ]);
    }
}
