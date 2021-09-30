<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{

    /*
    Constructor de la clase myauth
    */
    public function __construct()
    {
        $this->middleware('authRockstar');
    }


    /**
     * Listar recursos (Usuarios)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::paginate(10);
        return view("users.index")->with('Users', $Users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * // Crear un recurso (Usuario)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('users')->with('message', 'Registered user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreRequest $request, $id)
    {
        $modify = User::find($id);
        $modify->name = $request->input('username');
        $modify->email = $request->input('email');
        $modify->password = Hash::make($request->input('password'));
        $modify->save();

        return redirect('users')->with('message', 'Updated user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Método para deshabilitar un empleado
    public function enable($id){
        // Establecer el estado del empleado
        // null, 1 = Acivo, 0 = Inactivo
        $user = User::find($id);
        switch($user->Enable){
            case null: $user->Enable = 1;
                       $user->save();
                       $mensaje = 'Updated state from user '.$user->name;
            break;

            case 1: $user->Enable = 2;
                    $user->save();
                    $mensaje = 'Updated state from user '.$user->name;
            break;

            case 2: $user->Enable = 1;
                    $user->save();
                    $mensaje = 'Updated state from user '.$user->name;
            break;
        }
        // Redireccionar a la vista
        return redirect('users')->with('message', $mensaje);
    }
}
