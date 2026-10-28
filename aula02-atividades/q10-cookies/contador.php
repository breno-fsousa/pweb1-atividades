<?php
// Lê o cookie visitas. Se não existir, começa em 0.
$visitas = (int) ($_COOKIE['visitas'] ?? 0);
// Soma uma visita.
$visitas++;
// Salva o cookie por 1 hora (3600 segundos).
setcookie('visitas', (string) $visitas, time() + 3600);
// Mostra a quantidade de visitas.
echo "Você visitou esta página $visitas vez(es).";
