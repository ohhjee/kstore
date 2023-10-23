<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Inertia\Inertia;
use App\Mail\ResetToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class verifyMail extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/verifyMail');
    }
    public function checkMail(Request $request)
    {
        $checkUserMail = $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::whereIn('email', $checkUserMail)->first();
        // echo $user;
        if (!$user) {
            return redirect()->back()->with('error', 'mail does not exist');
        }
        $token = Str::random(8);
        $user->remember_token = $token;
        $user->save();

        try {
            Mail::to($user->email)->send(new ResetToken($token));
            return redirect()->back()->with('success', 'mail has been sent');
        } catch (\Throwable $th) {
            //throw $th;
            // return back()->with('errorM', $th->getMessage() ?? 'a mail can not be send to your email');
            return redirect()->back()->with('netWork', 'a mail can not be send to your email');
        }
    }
}
