<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\CreatePostRequest;

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

    public function show(Post $post)
    {
        return Response::success(
            new PostResource($post)
        );
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return Response::success();
    }
}
