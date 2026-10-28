<?php
// Define que a resposta será um JSON em UTF-8
header('Content-Type: application/json; charset=utf-8');
// Verifica qual método HTTP foi utilizado
$metodo = $_SERVER['REQUEST_METHOD'];
// Se o método não for POST
if ($metodo !== 'POST') {
    // Define o status HTTP 405
    http_response_code(405);

    // Informa que somente POST é permitido
    header('Allow: POST');

    // Envia a mensagem de erro em JSON
    echo json_encode(
        ['erro' => 'Método não permitido'],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

http_response_code(200);

echo json_encode(
    ['sucesso' => 'Dados recebidos'],
    JSON_UNESCAPED_UNICODE
);
