<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = "André Camargo";
        // $contato->telefone = "999999999";
        // $contato->email = "andre.camargo@msn.com";
        // $contato->motivo_contato = 1;
        // $contato->mensagem = "Seja bem vindo(a)";
        // $contato->save();

        factory(SiteContato::class, 100)->create();

    }

}
