<?php

function calcularNumeroExpressao($nome)
{
    // Definir valores para o alfabeto com base na sua solicitação
    $alfabeto = array(
        'a' => 1, 'A' => 1, 'b' => 2, 'B' => 2, 'c' => 3, 'C' => 3, 'd' => 4, 'D' => 4, 'e' => 5, 'E' => 5, 'f' => 8, 'F' => 8, 'g' => 3, 'G' => 3, 'h' => 5, 'H' => 5, 'i' => 1, 'I' => 1, 'j' => 1, 'J' => 1, 'k' => 2, 'K' => 2, 'l' => 3, 'L' => 3, 'm' => 4, 'M' => 4, 'n' => 5, 'N' => 5, 'o' => 7, 'O' => 7, 'p' => 8, 'P' => 8, 'q' => 1, 'Q' => 1, 'r' => 2, 'R' => 2, 's' => 3, 'S' => 3, 't' => 4, 'T' => 4, 'u' => 6, 'U' => 6, 'v' => 6, 'V' => 6, 'w' => 6, 'W' => 6, 'x' => 6, 'X' => 6, 'y' => 1, 'Y' => 1, 'z' => 7, 'Z' => 7, 'ç' => 6, 'Ç' => 6
    );

    $soma = 0;

    // Iterar sobre cada letras do nome
    for ($i = 0; $i < strlen($nome); $i++) {
        $letra = $nome[$i];
        if (array_key_exists($letra, $alfabeto)) {
            $soma += $alfabeto[$letra];
        }
    }

// Reduzir a soma a um único dígito ou número mestre
    while ($soma > 9 && $soma != 11 && $soma != 22) {
        $soma = array_sum(str_split($soma));
    }
    return $soma;
}

// Exemplo de uso
$nome = "Erika maria nascimento da silva cardoso";
$numeroExpressao = calcularNumeroExpressao($nome);
echo "O Número de Expressão para $nome é: $numeroExpressao";

