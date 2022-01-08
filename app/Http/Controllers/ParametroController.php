<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function recebe(string $p1, string $p2) {

        echo "Parâmetros recebido: <br>{$p1} <br> {$p2}";

        //Associativo
        // return view('site.parametro', ['associativo1' => $p1, 'associativo2' => $p2]);

        // Compact
        // return view('site.parametro', compact('p1', 'p2'));

        //With
        return view('site.parametro')->with('with1', $p1)->with('with2', $p2);

    }
}
