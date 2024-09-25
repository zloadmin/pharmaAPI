<?php

namespace App\Models;

use App\Enums\User\UserRole;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\Scopes\User\TeacherRoleScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;

#[ScopedBy([TeacherRoleScope::class])]
class Teacher extends User
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role' => UserRole::Teacher
    ];

    static function createFromStoreTeacherRequest(StoreTeacherRequest $request): self
    {
        return self::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
    }

    public function group(): HasOne
    {
        return $this->hasOne(Group::class, 'teacher_id', 'id');
    }
    public function updateFromUpdateTeacherRequest(UpdateTeacherRequest $request): void
    {
        $this->full_name = $request->full_name;
        $this->email = $request->email;
        if ($request->has('password')) {
            $this->password = Hash::make($request->password);
        }
        $this->update();
    }
}
