<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = new User(
            $request->only('name', 'username', 'email')
        );

        $user->password = bcrypt($request->password);
        $user->api_token = Str::random(80);

        $user->save();

        return Response::success(
            new UserResource($user)
        );
    }

    public function login()
    {
        // 
    }
}
