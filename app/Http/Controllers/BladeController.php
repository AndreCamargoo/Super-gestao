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
                'document' => '000.000.000-00',
                'ddd' => '11',
                'phone' => '00 0 0000-0000'
            ], 
            1 => [
                'name' => 'Andrezza Mendes',
                'status' => 'inativo',
                'document' => '000.000.000-00',
                'ddd' => '32',
                'phone' => '00 0 0000-0000'
            ],
            2 => [
                'name' => 'Carla lucia',
                'status' => 'inativo',
                'document' => '000.000.000-00',
                'ddd' => '21',
                'phone' => '00 0 0000-0000'
            ],
            3 => [
                'name' => 'Marlucia',
                'status' => 'inativo',
                'document' => '000.000.000-00',
                'ddd' => '18',
                'phone' => '00 0 0000-0000'
            ]
        ];
        $fornecedorVazio = [];

        return view('site.blade', compact('fornecedores', 'fornecedores1', 'fornecedorVazio'));

    }
}
