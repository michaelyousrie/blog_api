<?php

namespace App\Http\Resources;

use App\Helpers\Generals;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'user'                  => new UserResource($this->user),
            'text'                  => $this->text,
            // 'post'               => new PostResource($this->post),
            'created_at'            => $this->created_at->format(Generals::dateTimeFormat()),
            'friendly_created_at'   => $this->created_at->diffForHumans()
        ];
    }
}
