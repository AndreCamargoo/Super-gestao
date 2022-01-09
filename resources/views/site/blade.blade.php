<h1>Blade</h1>

<h3>Criar comentários com  blade</h3>
{{-- Aqui está meu comentário que será descardado pelo interpretardor do blade --}}
@php 
    //Para cometários com uma linha com PHP nativo
    /**
     * Cometário de multiplas linhas com PHP nativo
    */ 
@endphp

<br>
<hr>

<h3>RENDERIZAR</h3>
{{ 'BLADE: Meu texto renderizado na tela com blade' }}
<br>
@php
    echo 'PHP NATIVO: Meu texto renderizado na tela com PHP nativo'
@endphp

<br>
<hr>

<h3>IF/ELSEIF/ELSE</h3>

@php
    if(count($fornecedores) > 0 && count($fornecedores) < 10) {
        echo 'PHP NATIVO: Existem alguns forncedores cadastrados';
    } else if(count($fornecedores) > 10) {
        echo 'PHP NATIVO: Existem vários forncedores cadastrados';
    } else {
        echo 'PHP NATIVO: Ainda  não existem fornecedores cadastrados';
    }
@endphp
<br>
@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    {{ 'BLADE: Existem alguns forncedores cadastrados' }}    
@elseif(count($fornecedores) > 10)
    {{ 'BLADE: Existem vários forncedores cadastrados' }}
@else
    {{ 'BLADE: Ainda  não existem fornecedores cadastrados' }}
@endif

<br>
<hr>

<h3>UNLESS (inversão de resultados) </h3>

Fornecedor: {{ $fornecedores1[0]['name'] }} <br>
Status: {{ $fornecedores1[0]['status'] }} <br>

@php
    if( !($fornecedores1[0]['status'] == 'ativo') ) {
        echo 'PHP NATIVO: Fornecedor está INATIVO';
    }
@endphp
<br>
@unless ($fornecedores1[0]['status'] == 'ativo')
    {{ 'BLADE: Fornecedor está INATIVO' }}
@endunless

<br>
<hr>

<h3>ISSET (verificar a existencia de uma variável)</h3>

@isset($fornecedores2)
Fornecedor: {{ $fornecedores2[0]['name'] }} <br>
Status: {{ $fornecedores2[0]['status'] }} <br>
@else
Não existe
@endisset

<br>
<hr>

<h3>EMPTY (verificar se a variável estiver vazia ex: '', 0, 0.0, '0', null, false, array())</h3>

@isset($fornecedores1[0]['document'])
    @empty($fornecedores1[0]['document'])
        {{ 'Está vazia' }}
    @endempty
@endisset

<br>
<hr>

<h3>TERNÁRIO (atalho para o if)</h3>

@php
    echo $fornecedores1[0]['document'] ? 'Documento informado' : 'Documento não informado';
@endphp

<br>
<hr>

<h3>VALOR DEFAULT</h3>

Fornecedor: {{ $fornecedores1[0]['name'] }} <br>
Status: {{ $fornecedores1[0]['status'] }} <br>
Documento: {{ $fornecedores1[0]['document'] ?? 'Documento não foi preenchido' }} 
<!-- 
    $variavel testada não estiver definida (isset)
    ou
    $variavel testada possuir o valor null
-->

<br>
<hr>

<h3>SWITCH/CASE</h3>

@switch($fornecedores1[0]['ddd'])
    @case('11')
        BLADE: São Paulo
        @break
    @case('32')
        BLADE: Juiz de fora
        @break
    @case('21')
        BLADE: Rio de janeiro
        @break
    @default   
        BLADE: Nenhum ddd foi informado 
@endswitch

<br>

@php
    switch ($fornecedores1[1]['ddd']) {
        case '11':
            echo 'PHP NATIVO: São paulo';
            break;

        case '32':
            echo 'PHP NATIVO: Juiz de fora';
            break;

        case '21':
            echo 'PHP NATIVO: Rio de janeiro';
            break;
        
        default:
            echo 'PHP NATIVO: Nenhum ddd foi informado';
            break;
    }
@endphp

<br>
<hr>

<h3>FOR</h3>

@for ($i = 0; $i < 10; $i++)
    {{ $i }}
@endfor

<br>

@php
    for ($i=0; $i < 10; $i++) { 
        echo $i;
    }
@endphp

<br>
<hr>

<h3>WHILE</h3>

@php $i=0; @endphp
{{ 'BLADE' }} <br>
@while (isset($fornecedores1[$i]))
    Fornecedor: {{ $fornecedores1[$i]['name'] }} <br>
    @php $i++; @endphp
@endwhile

<br>

@php
    $i=0;
    echo 'PHP NATIVO <br>';
    while(isset($fornecedores1[$i])) {
        echo 'Fornecedor: '. $fornecedores1[$i]['name'] .'<br>';
        $i++;
    }
@endphp

<br>
<hr>

<h3>FOREACH</h3>

{{ 'BLADE' }} <br>
@foreach ($fornecedores1 as $fornecedor)
    Fornecedor: {{ $fornecedor['name'] }} <br>
@endforeach

<br>

@php    
    echo 'PHP NATIVO <br>';
    foreach ($fornecedores1 as $fornecedor) {
       echo 'Fornecedor: '. $fornecedor['name'] .'<br>';
    }
@endphp

<br>
<hr>

<h3>FORELSE</h3>

@forelse ($fornecedorVazio as $fornecedor)
    Fornecedor: {{ $fornecedor['name'] }} <br>
@empty
    Não existem fornecedores cadastrados
@endforelse

<br>
<hr>

<h3>ESCAPANDO A TAG DE IMPRESSÃO</h3>

@{{ $fornecedor1[0]['name'] }}

<br>
<hr>

<h3>VARIÁVEL LOOP</h3>

{{ 'BLADE' }} <br>
@forelse ($fornecedores1 as $fornecedor)
    Total de interações: {{ $loop->count }} <br>
    Interação atual: {{ $loop->iteration }} <br>
    {{-- @dd($loop) --}}
    Fornecedor: {{ $fornecedor['name'] }} <br>
@empty
    Não existem fornecedores cadastrados
@endforelse