<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewUserDetailTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_view_detail()
    {
        $loginResponse = $this->signIn();

        $this->get('/api/details', $loginResponse['headers'])
            ->assertStatus(200);
    }
}
