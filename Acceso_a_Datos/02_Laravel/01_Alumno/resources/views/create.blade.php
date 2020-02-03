<a href="{{route('alumnos_index')}}">Volver</a>
<form action="{{route('alumnos_store')}}" method="POST">
    @csrf
    <p>Nombre <input type="text" name="nombre" /></p>
    <p>Nota <input type="number" name="nota" /></input></p>
    <input type='submit' value="Crear"></button>
</form>