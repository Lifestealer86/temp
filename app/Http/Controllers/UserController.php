<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\ApiValidateException;
use Illuminate\Support\Str;
use App\Http\Requests\RegistrationRequest;

class UserController extends Controller
{
    public function authorization(Request $request): array
    {
        $user = User::where(['email' => $request->email])->first();

        if ($user and Hash::check($request->password, $user->password)) {
            return [
                'success' => true,
                'message' => 'Success',
                'token' => $user->createToken(Str::random(5))->plainTextToken
            ];
        }
        throw new ApiValidateException(401, false, 'Login failed');
    }

    public function registration(RegistrationRequest $request): array
    {
        return [
            'success' => true,
            'message' => 'Success',
            'token' => User::create($request->except('password')+['password'=>Hash::make($request->password)])
                ->createToken(Str::random(5))->plainTextToken
        ];
    }
}
