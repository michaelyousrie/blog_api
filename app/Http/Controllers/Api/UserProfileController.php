<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return Response::success(
            new UserResource($user)
        );
    }
}
