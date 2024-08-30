<?php

namespace App\Http\Resources\Group;

use App\Http\Resources\Student\StudentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'teacher_id'  => $this->teacher_id,
            'teacher'     => StudentResource::make($this->whenLoaded('teacher')),
            'students'    => StudentResource::collection($this->whenLoaded('students')),
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
