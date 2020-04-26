<?php

namespace App\Http\Resources;

use App\Helpers\Generals;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'author'                => new UserResource($this->author),
            'title'                 => $this->title,
            'body'                  => $this->body,
            'created_at'            => $this->created_at->format(Generals::dateTimeFormat()),
            'friendly_created_at'   => $this->created_at->diffForHumans()
        ];
    }
}
