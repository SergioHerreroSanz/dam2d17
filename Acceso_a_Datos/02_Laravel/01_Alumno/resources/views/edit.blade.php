<a href="{{route('alumnos_index')}}">Volver</a>
<form action="{{route('alumnos_update', $alumno -> id)}}" method="POST">
    @csrf
    @method('PUT')
    <p>Nombre <input type="text" name="nombreAlu" value="{{$alumno -> nombre}}"></input></p>
    <p>Nota <input type="number" name="notaAlu" value="{{$alumno -> nota}}"></input></p>
    <p><input type='submit' value="Actualizar"></button></p>
</form>