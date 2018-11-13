<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_be_able_to_authenticated_user_can_set_your_address_information()
    {
        $user = factory(User::class)->create();

        $data = [
            'cep' => '75380-000',
            'address' => '17 winchester 012',
            'number' => '181',
            'district' => 'Someplace',
            'city' => 'Murray',
            'state' => 'Utah'
        ];

        $uri = action('Web\AddressController@store');
        $this->actingAs($user)->postJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('addresses', [
            'user_id' => $user->id
        ]);
    }

    /** @test */
    public function it_should_be_the_authenticated_user_can_update_the_your_address_information()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $user->address()->create([
            'cep' => '75380-000',
            'address' => '17 winchester 012',
            'number' => '181',
            'district' => 'Someplace',
            'city' => 'Murray',
            'state' => 'Utah'
        ]);

        $data = [
            'cep' => '75380-999',
            'address' => '19 winchester 015',
            'number' => '991',
        ];

        $uri = action('Web\AddressController@update', ['user' => $user->id]);

        $this->actingAs($user)->putJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('addresses', [
            'user_id' => $user->id,
            'cep' => '75380-999',
            'address' => '19 winchester 015',
            'number' => '991',
        ]);
    }
}
