<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(Request $request)
	{
		$credentials = $request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		if (Auth::attempt($credentials, $request->remember)) {
			$request->session()->regenerate();

			return redirect()->intended('/');
		}

		throw ValidationException::withMessages(['email' => ['Invalid email or password']]);
		return back()->withErrors([
			'email' => 'Invalid email or password',
		]);
	}

	public function register(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => ['required', Password::min(8)->letters()->numbers()->symbols()],
			'terms' => 'accepted',
		]);

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
		]);
		Auth::login($user);
		$request->session()->regenerate();
		return redirect()->route('home');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('login');
	}
}
