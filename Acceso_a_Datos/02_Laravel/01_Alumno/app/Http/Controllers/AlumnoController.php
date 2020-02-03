<?php

namespace App\Http\Controllers;

use App\Alumno;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('index', compact('alumnos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $alumno = new Alumno();
        $alumno->nombre = request()->nombre;
        $alumno->nota = request()->nota;
        $alumno->save();
        return redirect()->route('alumnos_index');
    }

    public function show($id)
    {
        $alumno = Alumno::find($id);
        return view('show', compact('alumno'));
    }

    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('edit', compact('alumno'));
    }

    public function update($id)
    {
        $alumno = Alumno::find($id);
        $alumno->nombre = request()->nombreAlu;
        $alumno->nota = request()->notaAlu;
        $alumno->save();

        return redirect()->route('alumnos_index');
    }

    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        return redirect()->route('alumnos_index');
    }
}
