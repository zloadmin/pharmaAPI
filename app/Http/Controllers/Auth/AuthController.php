<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;

use App\Http\Requests\Auth\SignInUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


/**
 * @group Авторизация
 */
class AuthController extends ApiController
{
    /**
     * Вход в систему
     *
     * @authenticated
     * @response status=400 scenario="Credential Mismatch" {"status":"error","message":"Credential Mismatch"}
     * @response status=429 scenario="Validation Errors" {"message":"The email field is required. (and 1 more error)","errors":{"email":["The email field is required."],"password":["The password field is required."]}}
     * @apiResource App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\USer
     * @apiResourceAdditional accessToken="2|6XJgxX0hXMLErQx34CoaKpEkV6YvN5JKC5Yi8cBTe38d4ec6"
     */
    public function login(SignInUserRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $accessToken = $user->createToken('login');
            return (new UserResource($user))->additional([
                'accessToken' => $accessToken->plainTextToken
            ]);
        }
        return $this->respondCredentialMismatch();
    }
}
