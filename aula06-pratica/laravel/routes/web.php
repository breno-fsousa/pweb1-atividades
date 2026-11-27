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

Route::get('/tabuada/{numero}', function ($numero) {

    $resultado = '';

    for ($i = 1; $i <= 10; $i++) {
        $resultado .= "$numero x $i = " . ($numero * $i) . "<br>";
    }

    return $resultado;

})->whereNumber('numero');

Route::get('/idade/{ano}', function ($ano) {

    $idade = date('Y') - $ano;

    return "Quem nasceu em $ano tem ou vai fazer $idade anos em " . date('Y') . ".";

})->whereNumber('ano');

Route::get('/boas-vindas/{turma?}', function ($turma = 'ADS') {

    return "Bem-vinda, turma de $turma!";

});

Route::get('/admin', function () {
    return response('Área restrita', 403);
});

Route::get('/em-breve', function () {
    return response('Página em construção', 503);
});

Route::get('/loja', function () {
    return redirect('/feira', 302);
});

Route::get('/produtos-antigos', function () {
    return redirect('/produtos', 301);
});

Route::get('/feira', function () {
    return 'Bem-vindo à feira!';
});

Route::get('/produtos', function () {
    return 'Página de produtos!';
});

Route::get('/cardapio', function () {
   $pratos = [
    ['nome' => 'Baião de dois', 'preco' => 18.0],
    ['nome' => 'Tapioca de queijo', 'preco' => 8.5],
    ['nome' => 'Cuscuz com ovo', 'preco' => 7.0],
    ['nome' => '<b>Panelada</b>', 'preco' => 25.0],
];

    return view('cardapio', [
        'pratos' => $pratos
    ]);
})->name('cardapio');


