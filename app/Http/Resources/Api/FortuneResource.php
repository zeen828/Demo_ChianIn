<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FortuneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'number'  => $this->number,
            'level'   => $this->level,
            'title'   => $this->title,
            'content' => $this->content,
        ];
        // return parent::toArray($request);
    }
}
