<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Student\EducationMode;
use App\Enums\Student\EducationStatus;
use App\Enums\User\UserRole;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    protected $table = 'users';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'date_of_birth'     => 'date',
            'password'          => 'hashed',
            'role'              => UserRole::class,
            'education_mode'    => EducationMode::class,
            'education_status'  => EducationStatus::class,
            'teacher_id'        => 'integer'
        ];
    }

    static function createFromStoreUserRequest(StoreUserRequest $request): self
    {
        return self::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
    }

    public function updateFromUpdateUserRequest(UpdateUserRequest $request): void
    {
        $this->full_name = $request->full_name;
        $this->email = $request->email;
        if ($request->has('password')) {
            $this->password = Hash::make($request->password);
        }
        $this->update();
    }

    public function isStudent(): bool
    {
        return $this->role === UserRole::Student;
    }
    public function isAdmin(): bool
    {
        return $this->role === UserRole::Admin;
    }
    public function isTeacher(): bool
    {
        return $this->role === UserRole::Teacher;
    }
}
