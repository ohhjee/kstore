<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class navController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();
        // dd($user);
        return Inertia::render("components/Navbar", [
            'user' => $user
        ]);
    }
}
