@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <a class="btn btn-success" href="{{ url('empleado/create') }}" role="button">
                Crear empleado
            </a>
            @if (Session::has('mensaje'))
                <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                    <p>{{ Session::get('mensaje') }}</p>
                </div>
            @endif
            <h1>Index del empleado</h1>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->apellido }}</td>
                            <td>{{ $empleado->correo }}</td>
                            <td><img alt="{{ $empleado->nombre }}" class="img-thumbnail img-fluid"
                                    src="{{ asset('storage/' . $empleado->foto) }}" width="100px">
                            </td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-primary"
                                    href="{{ url('/empleado/' . $empleado->id . '/edit') }}">Editar</a>
                                <form action="{{ url('/empleado/' . $empleado->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger"
                                        onclick="return confirm('Esta seguro de eliminar el empleado?')" type="submit"
                                        value="Borrar">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $empleados->links() !!}
        </div>
    </div>
@endsection
