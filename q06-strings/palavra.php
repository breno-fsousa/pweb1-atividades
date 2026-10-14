<?php
$palavra = $_GET['palavra'] ?? "Ceara";
echo "<p>Palavra: $palavra</p>";

echo "<p>strlen: " . strlen($palavra) . "</p>";

echo "<p>mb_strlen: " . mb_strlen($palavra, 'UTF-8') . "</p>";

echo "<p>strtoupper: " . strtoupper($palavra) . "</p>";

echo "<p>mb_strtoupper: " . mb_strtoupper($palavra, 'UTF-8') . "</p>";

if (mb_strlen($palavra, 'UTF-8') <= 5) {
    echo "<p>Classificação: palavra curta</p>";
} else {
    echo "<p>Classificação: palavra longa</p>";
}
?>