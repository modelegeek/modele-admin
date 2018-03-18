<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group user
     */
    public function it_return_a_full_name()
    {
        $user = create(User::class, ['name' => 'Alex Tang']);

        $this->assertTrue($user->full_name() == 'Alex Tang');
    }
}
