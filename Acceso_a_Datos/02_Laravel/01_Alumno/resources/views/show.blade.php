<a href="{{route('alumnos_index')}}">Volver</a>
<form>
    <p>Nombre <input type="text" name="nombreAlu" value="{{$alumno -> nombre}}"></input></p>
    <p>Nota <input type="number" name="notaAlu" value="{{$alumno -> nota}}"></input></p>
</form>