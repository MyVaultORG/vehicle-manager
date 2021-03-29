<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (!Auth::attempt($credentials))
        {
            $json['access'] = false;
            $json['message'] = "Dados inválidos.<br>Verifique-os e tente novamente.";            
            return $json;
        }

        $json['redirect'] = Route("user.home");
        return $json;
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();        
        
        if ($data['password'] != $data['password_confirmation']) {
            $json['access'] = false;
            $json['message'] = "As senhas não conferem";
            
            return $json;
        }

        User::create($data);

        flash("Registro realizado com sucesso.")->success();
        $json['redirect'] = Route("web.login");

        return $json;
    }
}
