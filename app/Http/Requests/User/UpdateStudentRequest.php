<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends UpdateUserRequest
{
    public function getID() : ?int
    {
        return $this->route()->parameter('student')->id ?? null;
    }
}
