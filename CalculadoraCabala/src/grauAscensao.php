<?php


function calcularNumeroImpressao($nome)
{
    $consoantes = array(
        'B' => 2, 'C' => 3, 'D' => 4, 'F' => 8, 'G' => 3, 'H' => 5, 'J' => 1, 'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'P' => 8, 'Q' => 1, 'R' => 2, 'S' => 3, 'T' => 4, 'V' => 6, 'W' => 6, 'X' => 6, 'Z' => 7, 'Ç' => 6,
        'b' => 2, 'c' => 3, 'd' => 4, 'f' => 8, 'g' => 3, 'h' => 5, 'j' => 1, 'k' => 2, 'l' => 3, 'm' => 4, 'n' => 5, 'p' => 8, 'q' => 1, 'r' => 2, 's' => 3, 't' => 4, 'v' => 6, 'w' => 6, 'x' => 6, 'z' => 7, 'ç' => 6
    );

    $soma = 0;

    for ($i = 0; $i < strlen($nome); $i++) {
        $letra = $nome[$i];
        if (array_key_exists($letra, $consoantes)) {
            $soma += $consoantes[$letra];
        }
    }
    return $soma;
}

function calcularNumeroMotivacao($nome)
{
    $vogais = array(
        'A' => 1, 'E' => 5, 'I' => 1, 'O' => 7, 'U' => 6, 'Y' => 1,
        'a' => 1, 'e' => 5, 'i' => 1, 'o' => 7, 'u' => 6, 'y' => 1
    );

    $soma = 0;

    for ($i = 0; $i < strlen($nome); $i++) {
        $letra = $nome[$i];
        if (array_key_exists($letra, $vogais)) {
            $soma += $vogais[$letra];
        }
    }
    return $soma;
}

function compararNumeros($nome)
{
    $numeroImpressao = calcularNumeroImpressao($nome);
    $numeroMotivacao = calcularNumeroMotivacao($nome);

    if ($numeroMotivacao == $numeroImpressao) {
        return "Espírito Elevado";
    } elseif ($numeroMotivacao > $numeroImpressao) {
        return "Espirito Rebaixado";
    } else {
        return "Espírito em Ascensão";
    }
}

// Exemplo de uso
$nome = "GABRIEL AUGUSTO DO NASCIMENTO";
$resultado = compararNumeros($nome);
echo "Grau de Ascensao para $nome: $resultado";


