<div>
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
                    <td>{{ $empleado->Nombre }}</td>
                    <td>{{ $empleado->Apellido }}</td>
                    <td>{{ $empleado->Correo }}</td>
                    <td><img alt="{{ $empleado->Nombre }}" width="100px" src="{{ asset('storage/' . $empleado->Foto) }}"></td>
                    <td> Editar | Borrar </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
