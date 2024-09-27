<?php

namespace App\Http\Controllers\Profile;

use App\Enums\User\UserRole;
use App\Http\Controllers\ApiController;

use App\Http\Requests\Auth\ProfileRequest;
use App\Http\Requests\Auth\SignInUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


/**
 * @group [Общее] Профиль
 */
class ProfileController extends ApiController
{

    /**
     * Профиль
     *
     * @authenticated
     * @response status=400 scenario="Credential Mismatch" {"status":"error","message":"Credential Mismatch"}
     * @response status=429 scenario="Validation Errors" {"message":"\u041f\u043e\u043b\u0435 \u0444\u0438\u043e \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f.","errors":{"full_name":["\u041f\u043e\u043b\u0435 \u0444\u0438\u043e \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]}}
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\User
     */
    public function profile(ProfileRequest $request)
    {
        $user = auth()->user();
        $user->full_name = $request->full_name;
        if ($request->has('password') && $user->role == UserRole::Admin) {
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return UserResource::make($user);
    }
}
