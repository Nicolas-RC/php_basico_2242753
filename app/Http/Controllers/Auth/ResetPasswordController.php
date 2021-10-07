<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
// Paquetes para las caracteristicas
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;

// Correo personalizado
use App\Mail\ResetPasswordMail;
use Illuminate\Auth\Notifications\ResetPassword;

class ResetPasswordController extends Controller
{
    // Mostrar el formulario de envio de correo del link de seguridad
    // Ruta por método GET
    public function emailForm(){
        return view('auth.remember');
    }

    // Enviar el link de seguridad al correo anterior
    // Ruta por método POST
    public function submitLink(EmailRequest $request){
        // 1. Generar código aleatorio
        $token = Str::random(64);

        // 2. Registrar en la tabla password_resets email, código, fecha
        DB::table('password_resets')->insert(
            [
                "email" => $request->input('email'),
                "token" => $token,
                "created_at" => Carbon::now()
            ]
        );

        // 3. Enviar el email al destino, con el código de seguirdad
        Mail::to($request->input('email'))->send(new ResetPasswordMail($token));

        // 4. Retornar al login
        return redirect('login')->with("message", "Check your inbox");
    }

    // Mostrar el formulario para cambiar la contraseña
    // Ruta por método GET
    public function viewChange($token){
        return view("auth.resetPassword")->with('token', $token);
    }

    // Reiniciar la contraseña
    // Ruta por método POST
    public function changePassword(ResetPasswordRequest $request){
        // 1. Obtener el registro correspontiene al token y los datos ingresados en la tabla password_resets
        $passReset = DB::table('password_resets')
                        ->where(
                            ['email' => $request->input('email'),
                            'token' => $request->input('token')
                        ])->first();

        if($passReset == null) {
            die('Invalid token');
        }

        // 2. Actualizar la contraseña al usuario correspondiente
        $user = User::where('email', $request->input('email'))->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        echo "Cambio de password con exito";

        // 3. Eliminar el registro del token utilizado en la tabla password_resets
    }
}
