<div>
    <h1>Creación de empleado</h1>

    <form action="{{ route('empleado.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input id="nombre" name="nombre" required type="text">
        <br>
        <label for="apellido">Apellido:</label>
        <input id="apellido" name="apellido" required type="text">
        <br>
        <label for="foto">Foto:</label>
        <input id="foto" name="foto" required type="file">
        <br>
        <label for="correo">Correo:</label>
        <input id="correo" name="correo" required type="email">
        <br>
        <button type="submit">Crear Empleado</button>
    </form>
</div>
