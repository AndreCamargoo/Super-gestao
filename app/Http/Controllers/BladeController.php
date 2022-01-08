<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    public function index() {

        $fornecedores = ['Fornecedor 1'];
        $fornecedores1 = [
            0 => [
                'name' => 'André Camargo',
                'status' => 'inativo',
                'document' => '000.000.000-00'
            ]
        ];
        return view('site.blade', compact('fornecedores', 'fornecedores1'));

    }
}
