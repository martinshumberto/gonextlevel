<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ProfileAvatarUploadRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileAvatarUploadController extends Controller
{
    public function __invoke(ProfileAvatarUploadRequest $request)
    {
        $user = auth()->user();

        $hash = str_random(12);
        $avatarName = "{$user->id}_avatar_{$hash}.{$request->avatar->getClientOriginalExtension()}";

        $this->deleteIfExists($request->old_path);

        $path = $request->avatar->storeAs('avatars', $avatarName, 'public');

        $user->profile()->update(['avatar' => $path]);

        return ['path' => $path];
    }

    private function deleteIfExists($old_path)
    {
        if (Storage::disk('public')->exists($old_path)) {
            Storage::disk('public')->delete($old_path);
        }
    }
}
