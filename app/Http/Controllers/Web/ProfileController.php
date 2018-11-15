<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ProfileCreateRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->profile;
        return view('profile', compact('profile'));
    }

    public function store(ProfileCreateRequest $request)
    {
        $birth_date = new Carbon($request->input('birth_date'));

        Auth::user()->profile()->create([
            'cpf' => $request->input('cpf'),
            'cell_phone' => $request->input('cell_phone'),
            'phone' => $request->input('phone'),
            'birth_date' => $birth_date
        ]);

        return redirect('/home');
    }

    public function update(Request $request, User $user)
    {
        $user->profile()->update($request->except(['cpf', 'birth_date']));

        return $user->refresh();
    }
}