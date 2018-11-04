<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProspectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_be_able_to_an_authenticated_user_can_create_a_prospect()
    {
        $user = factory(User::class)->create();

        $data = [
            'name' => 'Jhon Sena',
            'email' => 'jhons@mail.com',
            'phone' => '(66) 99999-9999',
            'address' => '17 winchester, 180',
            'number' => '150',
            'district' => 'Murray',
            'city' => 'Salt lake',
            'state' => 'Utha'
        ];

        $uri = action('ProspectController@store');

        $this->actingAs($user)->postJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('prospects', [
            'user_id' => $user->id,
            'email' => 'jhons@mail.com'
        ]);
    }
}
