<?php

function calcularNumeroMotivacao($nome)
{
    // Definir valores para as vogais com base na sua solicitação
    $vogais = array(
        'A' => 1, 'E' => 5, 'I' => 1, 'O' => 7, 'U' => 6, 'Y' => 1,
        'a' => 1, 'e' => 5, 'i' => 1, 'o' => 7, 'u' => 6, 'y' => 1
    );

    $soma = 0;

    // Iterar sobre cada letra do nome
    for ($i = 0; $i < strlen($nome); $i++) {
        $letra = $nome[$i];
        if (array_key_exists($letra, $vogais)) {
            $soma += $vogais[$letra];
        }
    }

    // Reduzir a soma a um único dígito ou número mestre
    while ($soma > 9 && $soma != 11 && $soma != 22) {
        $soma = array_sum(str_split($soma));
    }

    return $soma;
}

// Exemplo de uso
$nome = "wesley alves cardoso";
$numeroMotivacao = calcularNumeroMotivacao($nome);
echo "O Número de Motivação para $nome é: $numeroMotivacao";


