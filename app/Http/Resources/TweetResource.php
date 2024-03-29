<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
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
            'id'=>$this->id,
            'user'=>new UserReseource($this->user),
            'text'=>$this->text,
            'created_at'=>$this->created_at,
        ];
    }
}
