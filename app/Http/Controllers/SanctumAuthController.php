<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

class SanctumAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido'=> 'required',
            'doctipo' => 'required',
            'docnro' => 'required|numeric',
            'email' => 'required|confirmed|unique:users',
            'password' => 'required|confirmed'
        ]);

        $cliente = new Cliente();

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->documento_tipo = $request->doctipo;
        $cliente->documento_numero = $request->docnro;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->IVA = 'Monotributista';
        $cliente->CUIT = $request->CUIT; 
        $cliente->password = Hash::make($request->password);

        $cliente->save();

        return response()->json(["El usuario ha sido creado correctamente."], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $cliente = Cliente::where('email','=', $request->email)->first();

        if(isset($cliente)){
            if(Hash::check($request->password, $cliente->password)){
                $token = $cliente->createToken("auth_token")->plainTextToken;
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
