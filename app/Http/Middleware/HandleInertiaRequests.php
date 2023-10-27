<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\Address;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        // $userAddress = $request->user()->id;

        return array_merge(parent::share($request), [
            'flash' => [
                'message' => session('message'),
                'mailVerification' => fn () => $request->session()->get('error'),
                'success' => fn () => $request->session()->get('success'),
                'errorM' => fn () => $request->session()->get('errorM'),
                'notification' => fn () => $request->session()->get('notification'),
                'netWork' => fn () => $request->session()->get('netWork'),
                "emailTrue" => fn () => $request->session()->get('emailTrue')

            ],

            'auth' => [
                'isLoggedIn' => auth()->check(),
                'user' => $request->user(),
                // "address" => Address::get()->whereIn('user_id', $userAddress)->first()

            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
