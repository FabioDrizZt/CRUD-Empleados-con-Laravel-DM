@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@csrf
<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input class="form-control mb-3" id="nombre" name="nombre" required type="text"
        value="{{ $empleado->nombre ?? old('nombre') }}">
</div>
<div class="form-group">
    <label for="apellido">Apellido:</label>
    <input class="form-control mb-3" id="apellido" name="apellido" required type="text"
        value="{{ $empleado->apellido ?? old('apellido') }}">
</div>
<div class="form-group">
    <label for="foto">Foto:</label>
    @if (isset($empleado->foto))
        <img alt="" class="form-control mb-3" src="/storage/{{ $empleado->foto }}" style="width: 200px" />
    @endif
    <input class="form-control mb-3" id="foto" name="foto" type="file">
</div>
<div class="form-group">
    <label for="correo">Correo:</label>
    <input class="form-control mb-3" id="correo" name="correo" required type="email"
        value="{{ $empleado->correo ?? old('correo') }}">
</div>
<a class="btn btn-primary" href="{{ url('empleado') }}" role="button">
    Volver atras
</a>
<button class="btn btn-success" type="submit">{{ $accion }} Empleado</button>
