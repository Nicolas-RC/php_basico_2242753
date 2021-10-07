<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordUserController extends Controller
{
    // Vista para cambiar la contraseña
    public function vistaCambiarPass($idUser){
        $idUser = User::find($idUser);
        return view('users.changePassword')->with('idUser', $idUser);
    }

    // Cambiar la contraseña del usuario
    public function cambiarContrasena(Request $request, $id){
        $modifyUser = User::find($id);
        $modifyUser->password = Hash::make($request->input('password'));
        $modifyUser->save();

        return redirect('login');
    }

}
