<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ProfileAvatarUploadRequest;
use App\Http\Controllers\Controller;

class ProfileAvatarUploadController extends Controller
{
    public function __invoke(ProfileAvatarUploadRequest $request)
    {
        $user = auth()->user();

        $avatarName = "{$user->id}_avatar.{$request->avatar->getClientOriginalExtension()}";

        $path = $request->avatar->storeAs('avatars', $avatarName, 'public');

        $user->profile()->update(['avatar' => $path]);

        return ['path' => $path];
    }
}
