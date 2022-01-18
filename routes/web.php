<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

//Controller
Route::middleware(LogAcessoMiddleware::class)
->get('/', 'PrincipalController@principal')
->name('site.index');

Route::get('/sobre', 'SobreNosController@principal')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@principal')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//Validando parâmetros
Route::get('/categoria/{nome_categoria}/{id_produto}', function(string $nome_categoria, int $id_produto) {
    echo "Categoria nome {$nome_categoria} e {$id_produto}";
})->name('site.categoria')->where('nome_categoria', '[A-Za-z]+')->where('id_produto', '[0-9]+');

//Agrupando e Adicionando um middleware e passando parâmetros
Route::prefix('/app')->middleware('autenticacao:padrao')->group(function() {

    Route::get('/home', 'HomeController@index')->name('app.index');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

});

//Redirect
Route::get('/rota1', function() { return 'Rota 1'; })->name('site.rota1');
Route::get('/rota2', function() { return 'Rota 2'; })->name('site.rota2');
Route::redirect('/rota3', 'rota2')->name('site.rota3');
Route::get('/rota4', function() {
    return redirect()->route('site.rota1');
})->name('rota4');

/* 
Encaminhando parâmetros para os controladores e do controlador para a view 
através dos métodos ( Array associativo, Compact, With ) 
*/
Route::get('/parametro/{p1}/{p2}', 'ParametroController@recebe')
->name('site.parametro')->where('p1', '[A-Za-z]+')->where('p2', '[A-Za-z]+');

//Comando BLADE
Route::get('/blade', 'BladeController@index')->name('site.blade');

//FallBack
Route::fallback(function() {
    return 'A rota acessada não existe.';
});

