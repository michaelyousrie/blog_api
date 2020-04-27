<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Comment;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
{
    public function store(CreateCommentRequest $request, Post $post)
    {
        $comment = Comment::create([
            'text'      => $request->text,
            'post_id'   => $post->id,
            'user_id'   => $request->user()->id
        ]);

        return Response::success(
            new CommentResource($comment)
        );
    }
}
