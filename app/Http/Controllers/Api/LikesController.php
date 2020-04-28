<?php

namespace App\Http\Controllers\Api;

use App\Like;
use App\Post;
use App\User;
use App\Comment;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\CommentResource;
use Illuminate\Database\Eloquent\Model;

class LikesController extends Controller
{
    protected function likeModel(Model $model, User $user)
    {
        return $model->likeByUser($user);
    }

    public function likePost(Post $post, Request $request)
    {
        $this->likeModel($post, $request->user());

        return Response::success(
            new PostResource($post)
        );
    }

    public function likeComment(Comment $comment, Request $request)
    {
        $this->likeModel($comment, $request->user());

        return Response::success(
            new CommentResource($comment)
        );
    }

    public function destroy(Like $like)
    {
        $like->delete();

        return Response::success();
    }
}
