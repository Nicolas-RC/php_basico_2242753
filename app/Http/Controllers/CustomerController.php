<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Mostrar una lista de recursos (clientes)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Customer::where('Enable', '=', 1)->
                            orwhere('Enable', '=', 2)->
                            paginate(6);

        return view('customer.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            "email" => 'required|email'
        ];

        // 1.1. Mensajes personalizados
        $mensajes = [
            'required' => 'Required',
            'alpha' => 'Only letters',
            'max' => 'Maximum of :max characteres'
        ];

        // 2. Crear el espacio especial para las validaciones
        $validar = Validator::make($request->all(), $reglas, $mensajes);

        //3. Realizar validación utilizado el validator
        if($validar->fails()) {
            // Zona de fallo
            return redirect('customer/create')
            ->withErrors($validar)
            ->withInput();

        }

        // Traer le máximo ID que este en la tabla cliente
        $maxId = Customer::all()->max('CustomerId');
        $maxId++;

        // Crear el nuevo recuros (cliente)
        $newCustomer = new Customer();
        $newCustomer->CustomerId = $maxId;
        $newCustomer->FirstName = $request->input('name');
        $newCustomer->LastName = $request->input('lastname');
        $newCustomer->Email = $request->input('email');
        $newCustomer->Enable = 1;
        $newCustomer->save();

        // Redirección con variables de sessión (flash)
        return redirect('customer')->with('message', 'Registered customer');
    }

    /**
     * Mostrar un cliente en específico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=Customer::find($id);
        return view('customer.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Seleccionar el recuros con el id del párametro
        $customer = Customer::find($id);
        // Retornar la vista con el id
        return view('customer.edit')->with('customer', $customer);
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
            "email" => 'required|email'
        ];

        // 1.1. Mensajes personalizados
        $mensajes = [
            'required' => 'Required',
            'alpha' => 'Only letters',
            'max' => 'Maximum of :max characteres'
        ];

        // 2. Crear el espacio especial para las validaciones
        $validar = Validator::make($request->all(), $reglas, $mensajes);

        //3. Realizar validación utilizado el validator
        if($validar->fails()) {
            // Zona de fallo
            return redirect('customer/'.$id.'/edit')
            ->withErrors($validar)
            ->withInput();

        }

        // Seleccionar el recurso a modificar
        $modify=Customer::find($id);

        // Actualizar el estado del recurso (cliente)
        $modify->FirstName = $request->input('name');
        $modify->LastName = $request->input('lastname');
        $modify->Email = $request->input('email');
        $modify->FirstName = $request->input('name');
        $modify->save();
        return redirect('customer')->with('message', 'Updated customer');
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

    // Método para deshabilitar un cliente
    public function enable($id){
        // Establecer el estado del cliente
        // null, 1 = Acivo, 0 = Inactivo
        $customer = Customer::find($id);
        switch($customer->Enable){
            case null: $customer->Enable = 1;
                       $customer->save();
                       $mensaje = 'Updated state from customer '.$customer->FirstName.' '.$customer->LastName;
            break;

            case 1: $customer->Enable = 2;
                    $customer->save();
                    $mensaje = 'Updated state from customer '.$customer->FirstName.' '.$customer->LastName;
            break;

            case 2: $customer->Enable = 1;
                    $customer->save();
                    $mensaje = 'Updated state from customer '.$customer->FirstName.' '.$customer->LastName;
            break;
        }
        // Redireccionar a la vista
        return redirect('customer')->with('message', $mensaje);
    }
}
