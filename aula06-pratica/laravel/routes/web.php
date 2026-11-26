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