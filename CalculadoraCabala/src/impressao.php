<?php

function calcularNumeroImpressao($nome)
{
    // Definir valores para as consoantes com base na sua solicitação
    $consoantes = array(
        'B' => 2, 'C' => 3, 'D' => 4, 'F' => 8, 'G' => 3, 'H' => 5, 'J' => 1, 'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'P' => 8, 'Q' => 1, 'R' => 2, 'S' => 3, 'T' => 4, 'V' => 6, 'W' => 6, 'X' => 6, 'Z' => 7, 'Ç' => 6,
        'b' => 2, 'c' => 3, 'd' => 4, 'f' => 8, 'g' => 3, 'h' => 5, 'j' => 1, 'k' => 2, 'l' => 3, 'm' => 4, 'n' => 5, 'p' => 8, 'q' => 1, 'r' => 2, 's' => 3, 't' => 4, 'v' => 6, 'w' => 6, 'x' => 6, 'z' => 7, 'ç' => 6
    );

    $soma = 0;

    // Iterar sobre cada letra do nome
    for ($i = 0; $i < strlen($nome); $i++) {
        $letra = $nome[$i];
        if (array_key_exists($letra, $consoantes)) {
            $soma += $consoantes[$letra];
        }
    }

    // Reduzir a soma a um único dígito
    while ($soma > 9) {
        $soma = array_sum(str_split($soma));
    }

    return $soma;
}

// Exemplo de uso
$nome = "Wesley Alves Cardoso";
$numeroImpressao = calcularNumeroImpressao($nome);
echo "O Número de Impressão para $nome é: $numeroImpressao";

