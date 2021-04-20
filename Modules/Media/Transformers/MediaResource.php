<?php

namespace Modules\Media\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use URL;

class MediaResource extends JsonResource
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
            'id' => $this->id,
            'image' => URL::to('/storage/'.$this->file),
            'type' => $this->type,
        ];
    }
}
