<?php

namespace App\Helpers;

class Response
{
    public static function success($data = [])
    {
        return self::response(true, $data);
    }

    public static function failure($data = [], $errors = [])
    {
        return self::response(false, $data, $errors);
    }

    private static function response(bool $success, $data = [], $errors = [])
    {
        $response_array = [
            'success'   => $success,
            'data'      => $data
        ];

        if (count($errors)) {
            $response_array = array_merge($response_array, ['errors' => $errors]);
        }

        return $response_array;
    }
}
