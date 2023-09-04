<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserService
{
    public static function index()
    {
        $model = User::query();
        if ((request()->has('select')) && (request()->query('select')) == 1) {
            return Cache::rememberForever('user:select', fn () => $model->select('id', 'first_name', 'last_name', 'email')->get());
        }
        return $model->get();
    }
    public static function paginate()
    {
        $model = User::query();
        return $model->paginate(10);
    }
    public static function cache()
    {
        Cache::put('user:select', User::select('id', 'first_name')->get());
    }
}
