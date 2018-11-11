<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_be_able_to_register_in_the_application_by_guest()
    {
        $this->withoutExceptionHandling();

        $data = [
            'name' => 'Guest User',
            'email' => 'guestuser@mail.com',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ];

        $this->post('/register', $data)
            ->assertRedirect('/user/info')
            ->assertSee('/user/info');

        $this->assertDatabaseHas('users', [
            'email' => 'guestuser@mail.com'
        ]);
    }
}
