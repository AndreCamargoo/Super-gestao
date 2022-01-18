<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function principal(Request $request) {

        if($request->all()) {

            $contato = new SiteContato();
            $contato->nome = $request->input('name');
            $contato->telefone = $request->input('phone');
            $contato->email = $request->input('email');
            $contato->motivo_contatos_id = $request->input('subject');
            $contato->mensagem = $request->input('message');
            $contato->save();

            /* Habilitar no Model o atributo fillable */
            // $contato2 = new SiteContato();
            // $contato2->fill($request->all());
            // $contato2->save();

            // $contato3 = new SiteContato();
            // $contato3->create($request->all());

            //SiteContato::create($request->all());

        }

        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', [
            'title' => 'Contato',
            'motivo_contatos' => $motivo_contatos
        ]);

    }

    public function salvar(Request $request)
    {

        //Realizar a validação dos dados do formulário recebidos no request
        $request->validate([
            'name' => 'required|min:3|max:30',
            'phone' => 'required',
            'email' => 'email',
            'subject' => 'required',
            'message' => 'required|max:2000'
        ], [
            'name.required' => 'O campo nome precisa ser preenchido',
            'name.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome precisa ter no máximo 30 caracteres',

            'required' => 'O campo :attribute deve ser preenchido',
            'email' => 'O campo :attribute não é válido'
        ]);

        $contato = new SiteContato();
        $contato->nome = $request->input('name');
        $contato->telefone = $request->input('phone');
        $contato->email = $request->input('email');
        $contato->motivo_contatos_id = $request->input('subject');
        $contato->mensagem = $request->input('message');
        $contato->save();
        
        return redirect()->route('site.index');
    }
}
