<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInformationController extends Controller
{
    public function __invoke()
    {
        return view('auth.info');
    }
}
