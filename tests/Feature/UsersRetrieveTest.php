<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UsersRetrieveTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function get_detail()
    {
        $loginResponse = $this->signIn();

        $this->get(route('user.index'), $loginResponse['headers'])
            ->assertStatus(200)
            ->assertJson([
                    'user_message'  => true,
                    'data'  => true,
            ]);
    }
}
