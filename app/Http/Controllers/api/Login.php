<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email|max:40",
            "password" => "required"
        ]);

        $user = User::where('email', '=', $validated['email'])->first();

        if($user){
            if(Hash::check($validated['password'], $user->password)) {
                return response()->json([
                "data" => [
                    "user" => $user,
                    "token" => $user->createToken("mobile")->plainTextToken
                ]
                ]);
            }
            return response()->json([
                "error" => "Wrong credentials."
            ], Response::HTTP_UNAUTHORIZED);
        }
        return response()->json([
            "error" => "User isn't registered."
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
