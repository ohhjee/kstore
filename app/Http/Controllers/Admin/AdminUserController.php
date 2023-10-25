<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SuspendAccount;
use App\Mail\UnsuspendAccount;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    public function index(User $user)
    {
        $users = $user->withTrashed()->get();
        return view('admin.users.index', compact('users'));
    }
    public function restore($id, Request $request)
    {
        // dd($request->user()->email);

        User::where('id', $id)->restore();
        $user = User::where('id', $id)->first();
        // $user = User::where($request->get('email', $id))->first();
        // dd($user);

        $firstName = $user->first_name;
        $lastName = $user->last_name;

        // $firstName = "user->first_name";
        try {
            // dd("hey");
            Mail::to($user->email)->send(new UnsuspendAccount($firstName, $lastName));
        } catch (\Throwable $th) {
            // dump("no going");
            // dd(throw $th);
        }
        return redirect('/admin/user');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user = User::where('id', $id)->first();
        // $user = User::where($request->get('email', $id))->first();
        // dd($user);

        $firstName = $user->first_name;
        $lastName = $user->last_name;

        // $firstName = "user->first_name";
        try {
            // dd("hey");
            Mail::to($user->email)->send(new SuspendAccount($firstName, $lastName));
        } catch (\Throwable $th) {
            // dump("no going");
            // dd(throw $th);
        }
        // dd($user);
        $user->delete();
        return redirect('/admin/user');
    }
}
