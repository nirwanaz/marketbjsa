<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as  U;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = U::findByEmail($validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)){
            return response([
                'success' => false,
                'message' => 'These credentials do not match our record'
            ], 404);
        }

        $token = $user->createToken('ApiToken')->plainTextToken;

        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout()
    {
        auth()->logout();
        
        return response()->json([
            'success' => true
        ], 200);
    }
}
