<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Helpers\Response;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Hash;

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

    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return Response::failure([
                'password'  => 'The password is incorrect!'
            ]);
        }

        return Response::success(
            new UserResource($user)
        );
    }
}
