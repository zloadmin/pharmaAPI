<?php

namespace App\Models;


use App\Enums\User\UserRole;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Scopes\User\StudentRoleScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Support\Facades\Hash;

#[ScopedBy([StudentRoleScope::class])]
class Student extends User
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role' => UserRole::Student
    ];

    static function createFromStoreStudentRequest(StoreStudentRequest $request, string $password): self
    {
        $student = self::create([
            'full_name'      => $request->full_name,
            'email'          => $request->email,
            'password'       => Hash::make($password),
            'teacher_id'     => $request->get('teacher_id'),
            'date_of_birth'  => Carbon::createFromFormat('d.m.Y', $request->date_of_birth),
            'education_mode' => $request->education_mode,
        ]);
        $student->addToGroupID($request->group_id);

        return $student;
    }

    public function updateFromUpdateStudentRequest(UpdateStudentRequest $request): void
    {
        $this->full_name = $request->full_name;
        $this->email = $request->email;
        $this->teacher_id = $request->get('teacher_id');
        $this->date_of_birth = Carbon::createFromFormat('d.m.Y', $request->date_of_birth);
        $this->education_mode = $request->education_mode;
        if ($request->has('password')) {
            $this->password = Hash::make($request->password);
        }
        $this->update();
        $this->updateGroupID($request->group_id);
    }

    public function addToGroupID(int $group_id): void
    {
        GroupStudent::firstOrCreate([
            'student_id' => $this->id,
            'group_id'   => $group_id
        ]);
    }

    public function updateGroupID(int $group_id): void
    {
        $group = GroupStudent::where('student_id', $this->id)->first();
        if($group) {
            $group->update(['group_id' => $group_id]);
        } else {
            $this->addToGroupID($group_id);
        }
//        GroupStudent::where('student_id', $this->id)->update([
//            'group_id' => $group_id
//        ]);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function group()
    {
        return $this->hasOneThrough(Group::class, GroupStudent::class, 'student_id', 'id', 'id', 'group_id');
    }
}
