<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SanctumAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|confirmed|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json(["El usuario ha sido creado correctamente."], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email','=', $request->email)->first();

        if(isset($user)){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json(["Se inicio sesión correctamente.", "access_token" => $token], 202);
            }else{
                return response()->json(["La contraseña provista es incorrecta.", "error" => true], 401); 
            }
        }else{
            return response()->json(["No existe el usuario provisto.", "error" => true], 500); 
        }
    }

    public function profile(){
        return Auth::user();
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json(["status" => 1, "Se ha cerrado sesión correctamente."], 200); 
    }
}
