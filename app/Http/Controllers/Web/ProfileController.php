<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ProfileCreateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = auth()->user()->profile;

        return view('profile', compact('profile'));
    }

    public function store(ProfileCreateRequest $request)
    {
        $profile = Profile::create($request->all());

        $profile->cpf = $request->input('cpf');
        $profile->birth_date = new Carbon($request->input('birth_date'));
        $profile->user_id = auth()->user()->id;
        $profile->save();

        return redirect('/home');
    }

    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $address = $request->address();
        auth()->user()->name = $request->name;
        $profile->update($request->profile());

        $profile->address()->updateOrCreate(['id' => $address['id']], $address);

        auth()->user()->save();

        return $profile->refresh();
    }
}
