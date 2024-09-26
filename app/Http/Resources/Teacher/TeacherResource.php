<?php

namespace App\Http\Resources\Teacher;

use App\Http\Resources\Department\DepartmentResource;
use App\Http\Resources\Group\GroupResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'full_name'     => $this->full_name,
            'regalia'       => $this->regalia,
            'age'           => $this->age,
            'department_id' => $this->department_id,
            'department'    => DepartmentResource::make($this->whenLoaded('department')),
            //            'full_name'  => $this->full_name,
            //            'email'      => $this->email,
            //            'group'      => GroupResource::make($this->whenLoaded('group')),
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
