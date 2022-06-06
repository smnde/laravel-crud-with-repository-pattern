<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{
		if(Auth::attempt($request->only(['username', 'password']))) {
			return redirect()->intended('/');
		}
		return redirect()->back();
	}
}
