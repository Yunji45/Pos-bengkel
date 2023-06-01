<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class loginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRegister()
    {
        $response = $this -> get('/register');
        $response->assertStatus(200);
    }

    public function testPostRegister()
    {
        $response = $this ->post('/register/actregister');
        $response -> assertStatus(302);
    }

    public function testLoginPost()
    {
        $response = $this->post('/login');
        $response->assertStatus(302);
    }
}
