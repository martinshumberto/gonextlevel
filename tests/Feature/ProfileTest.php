<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_be_able_to_authenticated_user_can_see_the_profile_view()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $user->profile()->create([
            'name' => 'Joseph Kairu',
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ]);

        $uri = action('ProfileController@index');

        $this->actingAs($user)->getJson($uri)
            ->assertSee($user->profile->name)
            ->assertSee($user->profile->cpf)
            ->assertSee($user->profile->cell_phone)
            ->assertSee($user->profile->phone)
            ->assertSee($user->profile->birth_date);
    }

    /** @test */
    public function it_should_be_able_to_user_authenticated_save_profile_informations()
    {
        $user = factory(User::class)->make();

        $data = [
            'name' => 'Joseph Kairu',
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ];

        $uri = action('ProfileController@store');

        $this->actingAs($user)->postJson($uri, $data)->assertRedirect('/billing');

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id
        ]);
    }

    /** @test */
    public function it_should_be_able_to_user_that_profile_belongs_to_be_able_to_update_it()
    {
        $user = factory(User::class)->create();
        $user->profile()->create([
            'name' => 'Joseph Kairu',
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ]);

        $data = [
            'name' => 'Joseph M. Kairu',
            'cell_phone' => '(55) 88888-8888',
        ];

        $uri = action('ProfileController@update', ['user' => $user->id]);

        $this->actingAs($user)->putJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'name' => 'Joseph M. Kairu',
            'cell_phone' => '(55) 88888-8888',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_user_can_update_just_necessary_fields()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $user->profile()->create([
            'name' => 'Joseph Kairu',
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ]);

        $data = [
            'name' => 'Joseph M. Kairu',
            'cpf' => '888.888.888-88',
            'birth_date' => '13-03-2000'
        ];

        $uri = action('ProfileController@update', ['user' => $user->id]);

        $this->actingAs($user)->putJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'name' => 'Joseph M. Kairu',
            'cpf' => '999.999.999-99',
            'birth_date' => '13-03-1998',
        ]);
    }
}