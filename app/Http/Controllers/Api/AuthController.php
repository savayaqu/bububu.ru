<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    // Registration
    public function register(RegisterRequest $request)
    {
        $role_user = Role::where('code', 'user')->first();
        $path = null;
        if($request->file('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
        }
        $user = User::create([
           ...$request->validated(), 'avatar' => $path, 'role_id' => $role_user->id
        ]);
        $user->update('api_token', Hash::make(Str::random(60)));
        return response()->json(['user' => $user, 'token' => $user->api_token])->setStatusCode(201);
    }
    //Authentication
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        {
            throw new ApiException('Unauthorized', 401);
        }
        $user = Auth::user();
        $user->update('api_token', Hash::make(Str::random(60)));
        return response()->json(['user' => $user, 'token' => $user->api_token])->setStatusCode(201);

    }
    //Logout
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->update('api_token', null);
        return response()->json()->setStatusCode(204);
    }
}
