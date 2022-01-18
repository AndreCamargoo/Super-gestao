<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = "André Camargo";
        $fornecedor->site = "site.com.br";
        $fornecedor->email = "andre.camargo@msn.com";
        $fornecedor->uf = "SP";
        $fornecedor->save();

        //método create ( Atenção para o atributo fillable da classe )
        Fornecedor::create([
            'nome' => 'André Camargo',
            'site' => 'site.com.br',
            'email' => 'andre.camargo@msn.com',
            'uf' => 'RJ'
        ]);

        //Insert
        DB::table('fornecedores')->insert([
            'nome' => 'André Camargo',
            'site' => 'site.com.br',
            'email' => 'andre.camargo@msn.com',
            'uf' => 'RJ'
        ]);
    }
}
