<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
{

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['token' => $user->createToken('auth-token')->plainTextToken]);
}

public function login(Request $request)
{

    if (!Auth::attempt($request->only('email', 'password'))) {
        throw ValidationException::withMessages(['message' => 'Invalid credentials']);
    }

    $user = User::where('email', $request->email)->first();

    return response()->json(['token' => $user->createToken('auth-token')->plainTextToken]);
}
}
