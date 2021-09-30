<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Mostrar el formulario de Login
    public function form(){
        return view('auth.login');
    }

    // Método para la autencicación del login
    public function login(Request $request){
        // Cookie remember me
        $remember = ($request->input('rememberMe') == null) ? false : true;

        // Validación del formulario
        // Reglas de validación y mensajes personalizados
        $reglas =[
            "email" => "required|email|max:30",
            "password" => "required"
        ];

        $mensajes = [
            "email.required" => "Email required",
            "email" => "Enter a valid email",
            "password.required" => "Password required",
            "max" => "It cannot be more than 30 characters"
        ];

        // Crear validación
        $validar = Validator::make($request->all(), $reglas, $mensajes);

        // Ejecutar la validación
        if($validar->fails()) {
            return redirect("login")
                                ->withErrors($validar)
                                ->withInput();
        }

        // Se utiliza la clase Auth que permite todo lo relacionado con la autenticación
        if(Auth::attempt($request->only(['email', 'password']), $remember)){
            return redirect('customer');
        }else {
            return redirect('login')->with('error_auth', 'Invalid credentials');
        }
    }

    // Método para cerrar sesión
    public function logout(){
        Auth::logout();
        return redirect('login')->with("message", "Session closed succesfully");
    }
}
