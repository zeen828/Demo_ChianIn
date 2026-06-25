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
            'id' => $this->id,
            'no' => $this->fortune_no,
            'title' => $this->title,
            'content' => $this->content,
            'summary' => $this->summary,
            'level' => $this->level,
            'code' => $this->code,
        ];
        // return parent::toArray($request);
    }
}
