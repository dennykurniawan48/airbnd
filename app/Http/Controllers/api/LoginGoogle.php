<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class LoginGoogle extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get("https://oauth2.googleapis.com/tokeninfo?id_token=$id");

        if ($response->successful()) {

            $json = json_decode($response->body(), true);


            $user = User::where("email", '=', $json['email'])->first();

            if ($user) {
                return response()->json([
                    'data' => [
                        "user" => $user,
                        "token" => $user->createToken("mobile")->plainTextToken
                    ]
                ]);
            } else {
                $user = new User();
                $user->email = $json["email"];
                $user->password = Hash::make(Str::random(40));
                $user->name = $json["name"];
                $user->save();

                $newUser = User::find($user->id);

                return response()->json([
                    'data' => [
                        "user" => $newUser,
                        "token" => $newUser->createToken("mobile")->plainTextToken
                    ]
                ]);
            }
        }else{
            return response()->json([
                'error' => "Wrong credentials."
            ], Response::HTTP_BAD_REQUEST);
        }

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
