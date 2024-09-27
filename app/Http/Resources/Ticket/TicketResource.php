<?php

namespace App\Http\Resources\Ticket;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                        => $this->id,
            'number'                    => $this->number,
            'title'                     => $this->title,
            'description_url'           => Storage::url($this->description_path),
            'description_original_name' => $this->description_original_name,
            'article_url'               => Storage::url($this->article_path),
            'article_original_name'     => $this->article_original_name,
            'level'                     => $this->level,
            'videos'                    => TicketVideoResource::collection($this->whenLoaded('videos')),
            'created_at'                => $this->created_at,
            'updated_at'                => $this->updated_at,
        ];
    }
}
