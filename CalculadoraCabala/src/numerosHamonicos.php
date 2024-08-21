<?php

function numerosHarmonicos($dataNascimento)
{
    // Extrair o dia da data de nascimento
    $dia = date('d', strtotime($dataNascimento));

    // Realizar a redução teosófica do dia
    $reduzido = array_sum(str_split($dia));
    while ($reduzido > 9) {
        $reduzido = array_sum(str_split($reduzido));
    }

    // Tabela de números harmônicos
    $numerosHarmonicosTabela = [
        1 => [2, 4, 9],
        2 => [1, 2, 3, 4, 5, 6, 7, 8, 9],
        3 => [2, 3, 6, 8, 9],
        4 => [1, 2, 6, 7],
        5 => [2, 5, 6, 7, 9],
        6 => [2, 3, 4, 5, 6, 9],
        7 => [2, 4, 5, 7],
        8 => [2, 3, 9],
        9 => [1, 2, 3, 5, 6, 8, 9],
    ];

    // Obter o conjunto de números harmônicos baseado no resultado reduzido
    $numerosResultantes = $numerosHarmonicosTabela[$reduzido];

    // Retornar o resultado
    return $numerosResultantes;
}

// Exemplo de uso
$dataNascimento = '22-05-1598';
$resultado = numerosHarmonicos($dataNascimento);
echo "Resultado: " . implode(", ", $resultado);

