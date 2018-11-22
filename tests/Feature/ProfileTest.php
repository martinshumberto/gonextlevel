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

    protected  $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = create(User::class);
    }

    /** @test */
    public function it_should_be_able_to_authenticated_user_can_access_your_profile_page_and_see_your_informations()
    {
        $this->withoutExceptionHandling();

        $profile = create(Profile::class, ['user_id' => $this->user->id]);

        $this->signIn($this->user);

        $uri = action('Web\ProfileController@index');

        $response = $this->getJson($uri)->assertStatus(200);

        $response
            ->assertSee($profile->cpf)
            ->assertSee($profile->cell_phone)
            ->assertSee($profile->phone)
            ->assertSee($profile->birth_date);
    }

    /** @test */
    public function it_should_be_able_to_user_authenticated_save_profile_information()
    {
        $data = [
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ];

        $uri = action('Web\ProfileController@store');

        $this->actingAs($this->user)->postJson($uri, $data)->assertRedirect('/home');

        $this->assertDatabaseHas('profiles', [
            'user_id' => $this->user->id
        ]);
    }

    /** @test */
    public function it_should_be_able_to_user_that_profile_belongs_to_be_able_to_update_it()
    {
        $this->user->profile()->create([
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ]);

        $data = [
            'cell_phone' => '(55) 88888-8888',
        ];

        $uri = action('Web\ProfileController@update', ['user' => $this->user->id]);

        $this->actingAs($this->user)->putJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('profiles', [
            'user_id' => $this->user->id,
            'cell_phone' => '(55) 88888-8888',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_user_can_update_just_necessary_fields()
    {
        $this->user->profile()->create([
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ]);

        $data = [
            'cpf' => '888.888.888-88',
            'birth_date' => '13-03-2000'
        ];

        $uri = action('Web\ProfileController@update', ['user' => $this->user->id]);

        $this->actingAs($this->user)->putJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('profiles', [
            'user_id' => $this->user->id,
            'cpf' => '999.999.999-99',
            'birth_date' => '13-03-1998',
        ]);
    }
}
