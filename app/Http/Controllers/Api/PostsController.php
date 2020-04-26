<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{
    public function store(CreatePostRequest $request)
    {
        $post = Post::create([
            'user_id'   => $request->user()->id,
            'title'     => $request->title,
            'body'      => $request->body
        ]);

        return Response::success(
            new PostResource($post)
        );
    }
}
