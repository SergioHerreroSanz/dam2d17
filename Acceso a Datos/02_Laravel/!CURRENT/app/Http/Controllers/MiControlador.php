<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiControlador extends Controller
{
    public function f1()
    {
        echo "Hola";
    }

    public function f2()
    {
        return view('despedida');
    }

    public function f1Param($nombre)
    {
        echo "Hola " . $nombre;
    }

    public function f2Param($nombre)
    {
        return view('despedidaParam', compact('nombre'));
    }

    public function f3Param($a, $b)
    {
        $s = $a + $b;
        return view('sumaParam', compact('a', 'b', 's'));
    }
}
