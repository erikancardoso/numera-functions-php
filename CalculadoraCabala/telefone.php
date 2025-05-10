<?php

function calcularVibracaoTelefone($telefone) {
    $numeros = preg_replace('/\D/', '', $telefone);
    $soma = array_sum(str_split($numeros));

    while (!in_array($soma, [11, 22]) && $soma > 9) {
        $soma = array_sum(str_split($soma));
    }

    return $soma;
}

$telefone = "49999659555";
echo "Vibração do telefone $telefone: " . calcularVibracaoTelefone($telefone);

