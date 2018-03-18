<?php

namespace Tests;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Handler\TestHandler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $oldExceptionHandler;

    /**
     * same as a constructor that always run before start any test case
     */
    public function setUp()
    {
        parent::setUp();

        $this->disableExceptionHandling();

        $this->artisan('passport:install');

        // $this->artisan('db:seed', ['--class' => 'RolesTableSeeder']);
    }

    /**
     * @param null $user
     * @return array
     */
    protected function signIn($user = null)
    {
        $user = $user ?? create('App\Models\User', [
            'password' => bcrypt('111111'),
        ]);

        $data = [
            'email'    => $user->email,
            'password' => '111111',
        ];

        $response = $this->post('/api/login', $data);
        $token = $response->getData()->data->token;

        $headers = [
            'HTTP_Authorization' => "Bearer $token"
        ];

        return $headers;
    }


    // Hat tip, @adamwathan.
    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, new TestHandler());
    }

    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }
}