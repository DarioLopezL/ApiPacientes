<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccesoRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    //apitokens para registrar
    public function registro(RegistroRequest $request){

        $user = new User();
        $user->name = $request->name ;
        $user->email=$request->email;
        $user->password=bcrypt( $request->password);
        $user->save();

        $user->roles()->attach($request->roles);

        return response()->json([
            'result' => true,
            'mensaje'=> 'Usuario Registrado correctamente'

        ],200);

    }

    public function login(AccesoRequest $request)
    {
        $user = User::with('roles')->where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Las credenciales son incorrectas!!!'],
        ]);
    }

    $token= $user->createToken($request->email)->plainTextToken;
    

    return response()->json([

        'result' => true,
        //'token'=> $token
        'mensaje'=>[
            'token' => $token,
            'usuario'=>$user
        ]
    ],200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccesstoken()->delete();
        return response()->json([

        'result' => true,
        'mensaje'=> 'token eliminado :( '
    ],200);
    }

}
