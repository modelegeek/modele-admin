<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRetrieveTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function get_detail()
    {
        $loginResponse = $this->signIn();

        $this->get(route('user.edit', ['user' => 1]), $loginResponse['headers'])
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name'  => true,
                    'email' => true,
                ]
            ]);
    }
}
