<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal() {

        $motivo_contatos = MotivoContato::all();
        
        return view('site.principal', 
        [
            'title' => 'Home',
            'motivo_contatos' => $motivo_contatos
        ]);
        
    }
}
