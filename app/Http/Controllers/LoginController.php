<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.screens.auth.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'login_name' => 'required',
            'password' => 'required'
        ]);

        $auth = Auth::attempt($request->only(['login_name', 'password']), $request->rememberMe ?: false);

        if ($auth) {
            $sessionUrl = session()->get('url');
            return redirect(route('admin.dashboard'));
        } else {
            return redirect()->back()->withErrors(['message' => 'Login failed! Username or password is not correct.']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login'))->with('success', 'Success! You\'ve logged out.');
    }
}
