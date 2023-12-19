<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Metodo para manejar un GET
        $datos['empleados'] = Empleado::Paginate(10);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosEmpleados = request()->except('_token');
        $reglas = [
            'nombre' => 'required|string|max:100|min:4',
            'apellido' => 'required|string|max:100',
            'correo' => 'required|email',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'min' => 'El nombre debe tener al menos 4 caracteres',
            'required' => 'El :attribute es requerido',
            'foto.required' => 'La foto es requerida',
        ];

        $this->validate($request, $reglas, $mensaje);

        if ($request->hasFile('foto')) {
            $datosEmpleados['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Empleado::insert($datosEmpleados);
        return redirect('empleado')->with('mensaje', 'Empleado creado con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Método para manejar un GET a empleado/{id_empleado}/edit
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)

    {
        // Metodo para manejar un PATCH a empleado/{id_empleado}
        $datosEmpleado = Request()->except(['_token', '_method']);
        $validacion=[
            'nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'correo'=>'required|email',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        if($request->hasFile('foto')){
            $validacion['foto']=['mimes:jpeg,png,jpg'];
        }
        $this->validate($request, $validacion, $mensaje);

        if ($request->hasFile('foto')) {
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/' . $empleado->foto);
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Empleado::where('id', '=', $id)->update($datosEmpleado);

        return redirect('empleado')->with('mensaje', 'Empleado editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Metodo para manejar un DELETE
        $empleado = Empleado::findOrFail($id);
        Storage::delete('public/' . $empleado->foto);
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado borrado correctamente.');
    }
}
