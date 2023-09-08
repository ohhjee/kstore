<?php

namespace App\Http\Controllers\Auth\Api;

use Rules\Password;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Symfony\Component\Console\Input\Input;

class AuthenticatedSessionController extends Controller
{
    public function create(Request $request): Response
    {
        $user = $request->session()->get('user');

        return Inertia::render('Auth/login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => $user,
        ]);
    }

    public function StepOne(Request $request)
    {
        $request->session()->get('user');

        $credentials = $request->validate([
            'email' => 'required|email|string|unique:users',
        ]);

        try {
            $user = User::where('email', '=', Input::get('email'))->first();
            dd($user);
            $request->session()->put("user", $credentials);
            if (empty($request->session()->get('user'))) {
            }
        } catch (\Throwable $th) {
        }
    }

    public function StepTwo(Request $request)
    {
        $request->session()->get('user');

        $credentials = $request->validate([
            'email' => 'required|email|string|unique:users',
            'password' =>  ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        try {
            $request->session()->put("user", $credentials);
            if (!empty($request->session()->get('user'))) {
                $request->session()->get('user');
                return to_route("login");
            }
        } catch (\Throwable $th) {
        }
    }
    public function StepThree(Request $request)
    {
        $request->session()->get('user');

        $credentials = $request->validate([
            'email' => 'required|email|string|unique:users',
            'password' =>  ['required', 'confirmed', Rules\Password::defaults()],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric|phone:US,NG|unique:users',
        ]);
        try {
            $request->session()->put("user", $credentials);
            if (!empty($request->session()->get('user'))) {
                $request->session()->get('user');

                return to_route("login");
            }
        } catch (\Throwable $th) {
        }
    }
    public function store(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email|string|unique:users',
            'gender' => 'in:male,female',
            'password' =>  ['required', 'confirmed', Rules\Password::defaults()],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric|phone:US,NG|unique:users',
            "dob" => 'date|before:12/31/2005'
        ]);
        $request->session()->put("user", $credentials);
        // dd($request->session()->get('user'));
        $user = $request->session()->get('user');
        $user_suc =    User::create($user);
        auth()->login($user_suc);
        try {
            // dd($credentials);

        } catch (\Throwable $th) {
        }
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
