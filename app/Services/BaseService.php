<?php

namespace App\Services;

class BaseService
{
    public static function send($data = [], $status = 200)
    {
        return response()->json($data, $status);
    }

    public static function error($message = 'Bad request', $errors = [], $status = 400)
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
