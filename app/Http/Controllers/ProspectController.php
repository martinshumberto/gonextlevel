<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProspectCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProspectController extends Controller
{
    public function store(ProspectCreateRequest $request)
    {
        Auth::user()->prospects()->create($request->all());
        return Auth::user()->refresh();
    }
}
