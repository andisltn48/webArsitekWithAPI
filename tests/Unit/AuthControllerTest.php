<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class AuthControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
//    public function test_example()
//    {
//        $this->assertTrue(true);
//    }
    public function test_login()
    {
        $this->call('/');

        $this->submitForm('Login', [
            'email' => 'andilan@gmail.com',
            'password' => 'Andi1110'
        ]);

        $this->seePageIs('/user');
    }
}
