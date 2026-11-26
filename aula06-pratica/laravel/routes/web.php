<?php

use Illuminate\Support\Facades\Route;

Route::get('/meu-nome', function () {
    return 'Meu nome é Breno França de Sousa e estudo ADS no IFCE.';
});  

Route::get('/cartao', function () {
    return '
        <h2>Breno França de Sousa</h2>

        <p>Estudante do 2º semestre de ADS no IFCE.</p>

        <ul>
            <li>Tecnologia</li>
            <li>Programação</li>
            <li>Jogos</li>
        </ul>
    ';
});

Route::get('/perfil-json', function () {
    return [
        'nome' => 'Breno França de Sousa',
        'semestre' => 2,
        'media' => 8.5,
        'bolsista' => false,

        'disciplinas' => [
            'Programação Web',
            'Banco de Dados',
            'Ciência de Dados'
        ],

        'endereco' => [
            'cidade' => 'Boa Viagem',
            'uf' => 'CE'
        ]
    ];
});

Route::get('/perfil-criado', function () {
    return response()->json([
        'nome' => 'Breno França de Sousa',
        'semestre' => 2,
        'media' => 8.5,
        'bolsista' => false,

        'disciplinas' => [
            'Programação Web',
            'Banco de Dados',
            'Ciência de Dados'
        ],

        'endereco' => [
            'cidade' => 'Boa Viagem',
            'uf' => 'CE'
        ]
    ], 201);
});