<?php

namespace App\Helpers;

class Response
{
    public static function success($data = [])
    {
        return self::response(true, $data);
    }

    public static function failure($errors = [], $data = [])
    {
        return self::response(false, $data, $errors, 422);
    }

    private static function response(bool $success, $data = [], $errors = [], $statusCode = 200)
    {
        $response_array = [
            'success'   => $success,
            'data'      => $data
        ];

        if (count($errors)) {
            $response_array = array_merge($response_array, ['errors' => $errors]);
        }

        return response()->json($response_array, $statusCode);
    }
}
