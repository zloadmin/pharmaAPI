<?php

namespace App\Http\Resources\Student;

use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Teacher\TeacherResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'full_name'      => $this->full_name,
            'email'          => $this->email,
            'teacher_id'     => $this->teacher_id,
            'teacher'        => TeacherResource::make($this->whenLoaded('teacher')),
            'group'          => GroupResource::make($this->whenLoaded('group')),
            'date_of_birth'  => $this->date_of_birth,
            'education_mode' => $this->education_mode,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
