<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Validation\Rule;

class UserProfile extends Controller
{
    public function create(Request $request): Response
    {
        $user = $request->user();
        return Inertia::render("profile", [
            'user' => $user,

        ]);
    }
    public function update(Request $request)
    {
        $UserID = Auth::id();
        $user = User::findOrfail($UserID);
        // dd($user);
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:225|' . Rule::unique('users')->ignore($user->id),

        ]);
        $user->fill([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->save();
        return back()->with('message', 'profile Updated');
    }
}
