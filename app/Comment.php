<?php

namespace App;

use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Likeable;

    protected $fillable = [
        'post_id', 'text', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
