<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_access_your_profile()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/profile');
        $response->assertSuccessful();
    }
}
