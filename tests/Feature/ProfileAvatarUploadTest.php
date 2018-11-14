<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileAvatarUploadTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->profile = factory(Profile::class)->create(['user_id' => $this->user->id]);
        $this->file = UploadedFile::fake()->image('avatar.jpg');
    }

    /** @test */
    public function it_should_be_able_to_authenticated_user_can_upload_an_avatar_to_your_profile()
    {
        $uri = action('Web\ProfileAvatarUploadController');

        $this->actingAs($this->user);
        $this->postJson($uri, ['avatar' => $this->file])
            ->assertSuccessful()
            ->assertJsonFragment(['path' => 'avatars/1_avatar.jpg']);

        Storage::disk('public')->assertExists('avatars/1_avatar.jpg');

        $this->assertDatabaseHas('profiles', [
            'user_id' => $this->user->id,
            'avatar' => 'avatars/1_avatar.jpg'
        ]);
    }
}
