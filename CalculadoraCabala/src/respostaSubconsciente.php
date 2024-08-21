<?php

// Tabela de Expressão fornecida
function letraParaNumero($letra)
{
    $tabela = [
        'a' => 1, 'A' => 1, 'b' => 2, 'B' => 2, 'c' => 3, 'C' => 3, 'd' => 4, 'D' => 4,
        'e' => 5, 'E' => 5, 'f' => 8, 'F' => 8, 'g' => 3, 'G' => 3, 'h' => 5, 'H' => 5,
        'i' => 1, 'I' => 1, 'j' => 1, 'J' => 1, 'k' => 2, 'K' => 2, 'l' => 3, 'L' => 3,
        'm' => 4, 'M' => 4, 'n' => 5, 'N' => 5, 'o' => 7, 'O' => 7, 'p' => 8, 'P' => 8,
        'q' => 1, 'Q' => 1, 'r' => 2, 'R' => 2, 's' => 3, 'S' => 3, 't' => 4, 'T' => 4,
        'u' => 6, 'U' => 6, 'v' => 6, 'V' => 6, 'w' => 6, 'W' => 6, 'x' => 5, 'X' => 5,
        'y' => 1, 'Y' => 1, 'z' => 7, 'Z' => 7
    ];

    return isset($tabela[$letra]) ? $tabela[$letra] : null;
}

function calcularRespostaSubconsciente($nome)
{
    $nome = preg_replace('/[^a-zA-Z]/', '', $nome); // Remove caracteres não alfabéticos
    $numeros = [];

    // Converte cada letra para o número correspondente
    for ($i = 0; $i < strlen($nome); $i++) {
        $letra = $nome[$i];
        $numero = letraParaNumero($letra);
        if ($numero !== null) {
            $numeros[] = $numero;
        }
    }

    // Remove duplicatas e conta os números únicos
    $numerosUnicos = array_unique($numeros);
    $contagemUnica = count($numerosUnicos);

    return $contagemUnica;
}

// Exemplo de uso:
$nome = "jayne sousa oliveira carmo ferreira"; // Substitua pelo nome desejado
$respostaSubconsciente = calcularRespostaSubconsciente($nome);
echo "Resposta subconsciente para '$nome' é: " . $respostaSubconsciente;

