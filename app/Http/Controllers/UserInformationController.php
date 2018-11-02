<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
    protected $redirectTo = '/user/address';

    public function index()
    {
        return view('auth.info');
    }

    public function store(Request $request)
    {
        $profile = Profile::create($request->all());
        $user = auth()->user();

        $user->profile()->associate($profile);
        $user->save();

        return redirect('user/address', compact(['user' => $user->fresh()]));
    }

    public function update(User $user, Request $request)
    {
        return $user->profile->update($request->all());
    }
}
