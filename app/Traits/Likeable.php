<?php

namespace App\Traits;

use App\Like;
use App\User;

trait Likeable
{
    public function likeByUser(User $user)
    {
        if ($this->isLikedByUser($user)) {
            return false;
        }

        return $this->likes()->save(new Like([
            'user_id'   => $user->id
        ]));
    }

    public function isLikedByUser(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->first();
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getLikesCount()
    {
        return $this->likes->count();
    }
}
