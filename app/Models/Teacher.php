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
//    protected $with = [
//        'department'
//    ];

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
//    static function createFromStoreTeacherRequest(StoreTeacherRequest $request): self
//    {
//        return self::create([
//            'full_name' => $request->full_name,
//            'email'     => $request->email,
//            'password'  => Hash::make($request->password),
//        ]);
//    }
    static function createFromStoreTeacherRequest(StoreTeacherRequest $request): self
    {
        return self::create([
            'full_name'     => $request->full_name,
            'regalia'       => $request->regalia,
            'age'           => $request->age,
            'department_id' => $request->department_id,
        ]);
    }

    public function group(): HasOne
    {
        return $this->hasOne(Group::class, 'teacher_id', 'id');
    }

    public function updateFromStoreTeacherRequest(StoreTeacherRequest $request): void
    {
        $this->full_name = $request->full_name;
        $this->regalia = $request->regalia;
        $this->age = $request->age;
        $this->department_id = $request->department_id;

        $this->update();
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
