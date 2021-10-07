<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Empleado;

class EmpleadoControler extends Controller
{
    /**
     * Mostrar una lista de recursos (empleados)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::paginate(6);

        return view('empleado.index')->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Proceso de validación de datos
        // 1. Establecer las reglas de validación en un arreglo
         $reglas = [
            "name" => 'required|alpha|max:25',
            "lastname" => 'required|alpha|max:25' ,
            "title" => 'required|alpha|max:25',
            "country" => 'required|alpha|max:15',
            "city" => 'required|alpha|max:15',
            "phone" => 'required|numeric',
            "email" => 'required|email',
            "address" => 'required|alpha_num'
        ];

        // 1.1. Mensajes personalizados
        $mensajes = [
            'required' => 'Required',
            'alpha' => 'Only letters',
            'max' => 'Maximum of :max characteres',
            'numeric' => 'Only numbers'
        ];

        // 2. Crear el espacio especial para las validaciones
        $validar = Validator::make($request->all(), $reglas, $mensajes);

        //3. Realizar validación utilizado el validator
        if($validar->fails()) {
            // Zona de fallo
            return redirect('employee/create')
            ->withErrors($validar)
            ->withInput();

        }

        // Traer le máximo ID que este en la tabla empleado
        $maxId = Empleado::all()->max('EmployeeId');
        $maxId++;

        // Crear el nuevo recurso (empleado)
        $newEmployee = new Empleado();
        $newEmployee->EmployeeId = $maxId;
        $newEmployee->FirstName = $request->input('name');
        $newEmployee->LastName = $request->input('lastname');
        $newEmployee->Title = $request->input('title');
        $newEmployee->Country = $request->input('country');
        $newEmployee->City = $request->input('city');
        $newEmployee->Phone = $request->input('phone');
        $newEmployee->Email = $request->input('email');
        $newEmployee->Address = $request->input('address');
        $newEmployee->save();

        // Redirección con variables de sessión (flash)
        return redirect('employee')->with('message', 'Registered employee');
    }

    /**
     * Mostrar un empleado en específico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('empleado.show')->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('empleado.edit')->with('empleado', $empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Proceso de validación de datos
        // 1. Establecer las reglas de validación en un arreglo
        $reglas = [
            "name" => 'required|alpha|max:25',
            "lastname" => 'required|alpha|max:25' ,
            "title" => 'required|alpha|max:25',
            "country" => 'required|alpha|max:15',
            "city" => 'required|alpha|max:15',
            "phone" => 'required|numeric',
            "email" => 'required|email',
            "address" => 'required|alpha_num'
        ];

        // 1.1. Mensajes personalizados
        $mensajes = [
            'required' => 'Required',
            'alpha' => 'Only letters',
            'max' => 'Maximum of :max characteres',
            'numeric' => 'Only numbers'
        ];

        // 2. Crear el espacio especial para las validaciones
        $validar = Validator::make($request->all(), $reglas, $mensajes);

        //3. Realizar validación utilizado el validator
        if($validar->fails()) {
            // Zona de fallo
            return redirect('employee/'.$id.'/edit')
            ->withErrors($validar)
            ->withInput();

        }

        $modify = Empleado::find($id);

        $modify->LastName = $request->input('lastname');
        $modify->FirstName = $request->input('name');
        $modify->Title = $request->input('title');
        $modify->Country = $request->input('country');
        $modify->City = $request->input('city');
        $modify->Phone = $request->input('phone');
        $modify->Email = $request->input('email');
        $modify->Address = $request->input('address');
        $modify->save();

        // Redirección con variables de sessión (flash)
        return redirect('employee')->with('message', 'Updated employee');
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
        $employee = Empleado::find($id);
        switch($employee->Enable){
            case null: $employee->Enable = 1;
                       $employee->save();
                       $mensaje = 'Updated state from employee '.$employee->FirstName.' '.$employee->LastName;
            break;

            case 1: $employee->Enable = 2;
                    $employee->save();
                    $mensaje = 'Updated state from employee '.$employee->FirstName.' '.$employee->LastName;
            break;

            case 2: $employee->Enable = 1;
                    $employee->save();
                    $mensaje = 'Updated state from employee '.$employee->FirstName.' '.$employee->LastName;
            break;
        }
        // Redireccionar a la vista
        return redirect('employee')->with('message', $mensaje);
    }
}
