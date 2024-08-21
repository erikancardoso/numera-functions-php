<?php

function trianguloDaVida($nomeCompleto)
{
    // Tabela de correspondência de letras para números
    $tabela = [
        'a' => 1, 'A' => 1, 'b' => 2, 'B' => 2, 'c' => 3, 'C' => 3,
        'd' => 4, 'D' => 4, 'e' => 5, 'E' => 5, 'f' => 8, 'F' => 8,
        'g' => 3, 'G' => 3, 'h' => 5, 'H' => 5, 'i' => 1, 'I' => 1,
        'j' => 1, 'J' => 1, 'k' => 2, 'K' => 2, 'l' => 3, 'L' => 3,
        'm' => 4, 'M' => 4, 'n' => 5, 'N' => 5, 'o' => 7, 'O' => 7,
        'p' => 8, 'P' => 8, 'q' => 1, 'Q' => 1, 'r' => 2, 'R' => 2,
        's' => 3, 'S' => 3, 't' => 4, 'T' => 4, 'u' => 6, 'U' => 6,
        'v' => 6, 'V' => 6, 'w' => 6, 'W' => 6, 'x' => 5, 'X' => 5,
        'y' => 1, 'Y' => 1, 'z' => 7, 'Z' => 7, 'ç' => 6, 'Ç' => 6
    ];

    // Converter o nome completo em números usando a tabela
    $numeros = [];
    for ($i = 0; $i < strlen($nomeCompleto); $i++) {
        $letra = $nomeCompleto[$i];
        if (isset($tabela[$letra])) {
            $numeros[] = $tabela[$letra];
        }
    }

    // Construir o triângulo
    $triangulo = [];
    $triangulo[] = $numeros;

    while (count($numeros) > 1) {
        $novaLinha = [];
        for ($i = 0; $i < count($numeros) - 1; $i++) {
            $soma = $numeros[$i] + $numeros[$i + 1];
            $novaLinha[] = $soma >= 10 ? $soma - 9 : $soma;
        }
        $triangulo[] = $novaLinha;
        $numeros = $novaLinha;
    }

    // Formatar o triângulo invertido
    $resultado = "";
    $maxLinha = count($triangulo);
    for ($i = 0; $i < $maxLinha; $i++) {
        $espacos = str_repeat(" ", $i);
        $linha = implode(" ", $triangulo[$i]);
        $resultado .= $espacos . $linha . "\n";
    }

    return $resultado;
}

// Exemplo de uso
$nomeCompleto = "Erika Maria Nascimento da Silva Cardoso"; // 7
echo "" . trianguloDaVida($nomeCompleto) . "";
