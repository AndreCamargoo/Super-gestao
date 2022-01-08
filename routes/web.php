<?php

use Illuminate\Support\Facades\Route;

//Controller
Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre', 'SobreNosController@principal')->name('site.sobre');
Route::get('/contato', 'ContatoController@principal')->name('site.contato');
Route::get('/login', function() { return 'Login'; })->name('site.login');

//Validando parâmetros
Route::get('/categoria/{nome_categoria}/{id_produto}', function(string $nome_categoria, int $id_produto) {
    echo "Categoria nome {$nome_categoria} e {$id_produto}";
})->name('site.categoria')->where('nome_categoria', '[A-Za-z]+')->where('id_produto', '[0-9]+');

//Agrupando
Route::prefix('/app')->group(function() {

    Route::get('/clientes', function() { return 'Cliente'; })->name('app.clientes');
    Route::get('/fornecedores', function() { return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function() { return 'Produtos'; })->name('app.produtos');

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

