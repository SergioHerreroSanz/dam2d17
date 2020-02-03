<br>
<table border="2" style="margin-bottom: 10px;">
    <tr>
        <th>Nombre</th>
        <th>Nota</th>
        <th>Acción</th>
    </tr>

    @foreach($alumnos as $alumno)
    <tr>
        <td>{{$alumno -> nombre}}</td>
        <td>{{$alumno -> nota}}</td>
        <td>
            <a href="{{route('alumnos_show', $alumno->id)}}"><button>Ver</button></a>
            <a href="{{route('alumnos_edit', $alumno -> id)}}"><button>Editar</button></a>
            <form action="{{route('alumnos_destroy', $alumno -> id)}}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type='submit'>Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
    </form>
</table>
<a href="{{route('alumnos_create')}}"><button>Crear</button></a>