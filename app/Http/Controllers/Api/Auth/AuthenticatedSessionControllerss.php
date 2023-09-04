<?php

namespace App\Http\Controllers\Auth\Api;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\RegisterationSuccessNotice;
use App\Http\Requests\Auth\RegisterRequest;

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
    public function RegisterIndex(Request $request): Response
    {
        // dd($request);
        return Inertia::render('Auth/register');
    }
    public function register(RegisterRequest $request)
    {
        // $product = $request->session()->get("user");
        // dd($product);
        // if (empty($request->session()->get('user'))) {
        //     $product = new User();
        //     $product->fill($credentials);
        //     $request->session()->put('product', $product);
        // } else {
        //     $product = $request->session()->get('user');
        //     // dd($product);
        //     $product->fill($credentials);
        //     $request->session()->put('user', $product);
        // }
        try {
            $user = User::create(array_merge($request->validated(), ['password' => Hash::make($request->get('password'))]));
            Auth::login($user);
            Mail::to($user->email)->send(new RegisterationSuccessNotice($user));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([


                'network' => 'network error'
            ]);
        }
    }
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => [
                'required'
            ],
        ]);

        if (Auth::attempt($credentials)) {

            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
    public function edit(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'string',
            'email' => 'email|string|exists:users,email',

        ]);
        dd($credentials);
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
