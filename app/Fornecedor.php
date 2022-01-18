<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{

    //Trait
    use SoftDeletes;

    //Informar o nome da tabela
    protected $table = 'fornecedores';

    //Permitir ORL Fillable
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
