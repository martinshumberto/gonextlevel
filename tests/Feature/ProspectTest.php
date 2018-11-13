<?php

namespace Tests\Feature;

use App\Models\Prospect;
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

        $uri = action('Web\ProspectController@store');

        $this->actingAs($user)->postJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('prospects', [
            'user_id' => $user->id,
            'name' => 'Jhon Sena',
            'email' => 'jhons@mail.com',
            'phone' => '(66) 99999-9999',
            'address' => '17 winchester, 180',
            'number' => '150',
            'district' => 'Murray',
            'city' => 'Salt lake',
            'state' => 'Utha'
        ]);
    }

    /** @test */
    public function it_should_be_able_to_authenticated_user_car_edit_your_prospect()
    {
        $user = factory(User::class)->create();
        $prospect = factory(Prospect::class)->create(['user_id' => $user->id]);

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

        $uri = action('Web\ProspectController@update', ['prospect' => $prospect->id]);

        $this->actingAs($user);
        $this->putJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('prospects', [
            'user_id' => $user->id,
            'name' => 'Jhon Sena',
            'email' => 'jhons@mail.com',
            'phone' => '(66) 99999-9999',
            'address' => '17 winchester, 180',
            'number' => '150',
            'district' => 'Murray',
            'city' => 'Salt lake',
            'state' => 'Utha'
        ]);
    }

    /** @test */
    public function it_should_be_able_to_a_prospect_only_be_able_to_edited_by_an_user_that_he_belongs_to()
    {
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $prospect = factory(Prospect::class)->create(['user_id' => $user->id]);

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

        $uri = action('Web\ProspectController@update', ['prospect' => $prospect->id]);

        $this->actingAs($user2);
        $this->putJson($uri, $data)->assertForbidden();

        $this->assertDatabaseMissing('prospects', [
            'user_id' => $user->id,
            'name' => 'Jhon Sena',
            'email' => 'jhons@mail.com',
            'phone' => '(66) 99999-9999',
            'address' => '17 winchester, 180',
            'number' => '150',
            'district' => 'Murray',
            'city' => 'Salt lake',
            'state' => 'Utha'
        ]);
    }

    /** @test */
    public function it_should_be_able_to_authenticated_user_can_delete_a_prospect()
    {
        $user = factory(User::class)->create();
        $prospect = factory(Prospect::class)->create(['user_id' => $user->id]);

        $uri = action('Web\ProspectController@destroy', ['prospect' => $prospect->id]);

        $this->actingAs($user);
        $this->deleteJson($uri)->assertSuccessful();

        $this->assertDatabaseMissing('prospects', [
            'user_id' => $user->id,
            'name' => $prospect->name,
            'email' => $prospect->email,
            'phone' => $prospect->phone,
            'address' => $prospect->address,
            'number' => $prospect->number,
            'district' => $prospect->district,
            'city' => $prospect->city,
            'state' => $prospect->state
        ]);
    }

    /** @test */
    public function it_should_be_able_to_a_prospect_only_be_able_to_deleted_by_an_user_that_he_belongs_to()
    {
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $prospect = factory(Prospect::class)->create(['user_id' => $user->id]);

        $uri = action('Web\ProspectController@destroy', ['prospect' => $prospect->id]);

        $this->actingAs($user2);
        $this->deleteJson($uri)->assertForbidden();

        $this->assertDatabaseHas('prospects', [
            'user_id' => $user->id,
            'name' => $prospect->name,
            'email' => $prospect->email,
            'phone' => $prospect->phone,
            'address' => $prospect->address,
            'number' => $prospect->number,
            'district' => $prospect->district,
            'city' => $prospect->city,
            'state' => $prospect->state
        ]);
    }
}
