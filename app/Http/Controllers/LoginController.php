<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';        
        if($request->get('erro') == 1) $erro = 'Usuário e\ou senha é inválido';
        if($request->get('erro') == 2) $erro = 'Você precisa fazer o login';

        return view('site.login', [
            'title' => 'Login',
            'erro' => $erro
        ]);

    }

    public function autenticar(Request $request) {

        $regras = [
            'usuario' => 'email',
            'senha' => 'required|min:4'
        ];

        $feedBack = [
            'email' => 'O campo usuário (email) é obrigatório',
            'required' => 'O campo senha é obrigatório',
            'min' => 'A senha deve ter no mínimo 4 caracteres'
        ];

        $request->validate($regras, $feedBack);

        //Recuprando parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //Iniciar o model user
        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->first();

        if(!$usuario) return redirect()->route('site.login', [
            'erro' => 1
        ]);

        session_start();
        $_SESSION['nome'] = $usuario->name;
        $_SESSION['email'] = $usuario->email;

        return redirect()->route('app.cliente');

    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
