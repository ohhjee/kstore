<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Inertia\Inertia;
use App\Mail\ResetToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'token' => 'required',
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dump($request->get("token"));
        $user = User::where('remember_token', $request->get('token'))->first();
        // dd($user);
        if (!$user) {
            return redirect()->back()->with(['notification' => 'Token has expired'], 422);
        };
        // $user->update([
        //     $user->password = Hash::make($request->password),
        //     $user->remember_token = null
        // ]);
        #continue from here  SEND AN EMAIL TO USER WHEN PASSWORD HAS BEEN CHANGED
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return Inertia::render('Auth/resetPassword', [
            'token' => $user->remember_token
        ]);
    }
    public function checkMail(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dump($request->get("token"));
        $user = User::where('remember_token', $request->get('token'))->first();
        // dd($user);
        if (!$user) {
            return redirect()->back()->with(['notification' => 'Token has expired'], 422);
        };
        $user->update([
            $user->password = Hash::make($request->password),
            $user->remember_token = null
        ]);
        // dd($user);
        return to_route('');
        #continue from here  SEND AN EMAIL TO USER WHEN PASSWORD HAS BEEN CHANGED
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        // $checkUserMail = $request->validate([
        //     'email' => 'required|email'
        // ]);
        // $user = User::whereIn('email', $checkUserMail)->first();
        // // echo $user;
        // if (!$user) {
        //     return redirect()->back()->with('error', 'mail does not exist');
        // }
        // $token = Str::random(8);
        // $user->remember_token = $token;
        // $user->save();

        // try {
        //     Mail::to($user->email)->send(new ResetToken($token));
        //     return redirect()->back()->with('success', 'mail has been sent');
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return back()->with('errorM', $th->getMessage() ?? 'a mail can not be send to your email');
        //     // return redirect()->back()->with('netWork', 'mail does not exist');
        // }
    }
}
