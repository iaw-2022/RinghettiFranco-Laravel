<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use Exception;

class SanctumAuthController extends Controller
{
    public function signin(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'documento_tipo' => 'required',
            'documento_numero' => 'required|numeric',
            'email' => 'required|confirmed|unique:users',
            'password' => 'required|confirmed'
        ]);

        $cliente = new Cliente();

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->documento_tipo = $request->documento_tipo;
        $cliente->documento_numero = $request->documento_numero;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->IVA = 'Consumidor final';
        $cliente->CUIT = $request->CUIT;
        $cliente->password = Hash::make($request->password);

        $cliente->save();

        return response()->json([$cliente], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $cliente = Cliente::where('email', '=', $request->email)->first();

        if (isset($cliente)) {
            if (Hash::check($request->password, $cliente->password)) {
                $token = $cliente->createToken("auth_token")->plainTextToken;
                return response()->json(["Se inicio sesión correctamente.", "access_token" => $token], 202);
            } else {
                return response()->json(["La contraseña provista es incorrecta.", "error" => true], 401);
            }
        } else {
            return response()->json(["No existe el usuario provisto.", "error" => true], 404);
        }
    }

    public function profile()
    {
        return Auth::user();
    }

    public function modify(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'documento_tipo' => 'required',
            'documento_numero' => 'required|numeric',
            'email' => 'required|unique:users',
            'IVA' => 'required',
            'password' => 'prohibited'
        ]);

        try {
            $cliente = Auth::user();

            $cliente->update($request->all());

            return response()->json([$cliente], 202);
        } catch (Exception $ex) {
            return response()->json(["error" => true], 500);
        }
    }

    public function passwordchange(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        $cliente = Auth::user();

        if (Hash::check($request->old_password, $cliente->password)) {
            $cliente->password = $request->new_password;
            $cliente->save();

            $cliente->tokens()->delete();
            $token = $cliente->createToken("auth_token")->plainTextToken;

            return response()->json(["Se cambio de forma correcta la contraseña.", "access_token" => $token], 202);
        } else {
            return response()->json(["La contraseña provista es incorrecta.", "error" => true], 401);
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(["status" => 1, "Se ha cerrado sesión correctamente."], 202);
    }

    public function signout()
    {
        Auth::user()->tokens()->delete();
        Auth::user()->delete();
        return response()->json(["status" => 1, "Se ha cerrado su cuenta correctamente."], 202);
    }
}
