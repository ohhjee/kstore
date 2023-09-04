<?php

namespace App\Http\Controllers\Auth\Api;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    //
    public function create(): Response
    {
        return Inertia::render('Auth/login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        dd($user);


        // $credentials = $request->validate([
        //     'email' => 'required|email|string|exists:users,email',
        // ]);

        // if(empty($request->session()->get('')))


        // if (Auth::attempt($credentials)) {

        //     return redirect()->intended(RouteServiceProvider::HOME);
        // }
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
