<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressCreateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function store(AddressCreateRequest $request)
    {
        Auth::user()->address()->create($request->all());
        return Auth::user()->refresh();
    }

    public function update(Request $request, User $user)
    {
        $user->address()->update($request->all());
        return $user->refresh();
    }
}
