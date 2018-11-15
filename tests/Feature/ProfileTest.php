<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Models\Profile;
use App\Models\SocialMedia;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_be_able_to_user_authenticated_save_profile_informations()
    {
        $user = factory(User::class)->make();

        $data = [
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ];

        $uri = action('Web\ProfileController@store');

        $this->actingAs($user)->postJson($uri, $data)->assertRedirect('/home');

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id
        ]);
    }

    /** @test */
    public function it_should_be_able_to_user_that_profile_belongs_to_be_able_to_update_it()
    {
        $user = factory(User::class)->create();
        $user->profile()->create([
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ]);

        $data = [
            'cell_phone' => '(55) 88888-8888',
        ];

        $uri = action('Web\ProfileController@update', ['user' => $user->id]);

        $this->actingAs($user)->putJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'cell_phone' => '(55) 88888-8888',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_user_can_update_just_necessary_fields()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $user->profile()->create([
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ]);

        $data = [
            'cpf' => '888.888.888-88',
            'birth_date' => '13-03-2000'
        ];

        $uri = action('Web\ProfileController@update', ['user' => $user->id]);

        $this->actingAs($user)->putJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'cpf' => '999.999.999-99',
            'birth_date' => '13-03-1998',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_auth_user_add_your_social_medias_to_profile()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user->profile()->create([
            'cpf' => '999.999.999-99',
            'cell_phone' => '(55) 99999-9999',
            'phone' => '(55) 9999-9999',
            'birth_date' => '13-03-1998',
        ]);

        $data = [
            'link' => 'https://www.facebook.com',
            'type' => 'facebook',
        ];

        $uri = action('Web\SocialMediaController');

        $this->actingAs($user);
        $this->postJson($uri, $data)->assertSuccessful();

        $this->assertDatabaseHas('social_medias', [
            'profile_id' => 1,
            'link' => 'https://www.facebook.com',
            'type' => 'facebook',
        ]);
    }
}
