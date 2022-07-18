<?php

namespace Modules\Product\Transformers\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user'=>$this->user,
            'body'=>$this->body,
            'product'=>$this->commentable

        ];
    }
}
