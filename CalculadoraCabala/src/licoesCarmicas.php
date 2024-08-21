<?php
function calculoLicoesCarmicas($nome) {
    // Tabela de valores para cada letra
    $tabela = [
        'a' => 1, 'A' => 1, 'b' => 2, 'B' => 2, 'c' => 3, 'C' => 3, 'd' => 4, 'D' => 4,
        'e' => 5, 'E' => 5, 'f' => 8, 'F' => 8, 'g' => 3, 'G' => 3, 'h' => 5, 'H' => 5,
        'i' => 1, 'I' => 1, 'j' => 1, 'J' => 1, 'k' => 2, 'K' => 2, 'l' => 3, 'L' => 3,
        'm' => 4, 'M' => 4, 'n' => 5, 'N' => 5, 'o' => 7, 'O' => 7, 'p' => 8, 'P' => 8,
        'q' => 1, 'Q' => 1, 'r' => 2, 'R' => 2, 's' => 3, 'S' => 3, 't' => 4, 'T' => 4,
        'u' => 6, 'U' => 6, 'v' => 6, 'V' => 6, 'w' => 6, 'W' => 6, 'x' => 5, 'X' => 5,
        'y' => 1, 'Y' => 1, 'z' => 7, 'Z' => 7
    ];

    // Contador de frequências dos números
    $frequencia = array_fill(1, 9, 0);

    // Calcular a soma das letras e atualizar frequências
    foreach (str_split($nome) as $letra) {
        if (isset($tabela[$letra])) {
            $valor = $tabela[$letra];
            $frequencia[$valor]++;
        }
    }

    // Identificar lições cármicas
    $licoesCarmicas = [];
    foreach ($frequencia as $numero => $contagem) {
        if ($contagem == 0) {
            $licoesCarmicas[] = $numero;
        }
    }

    return $licoesCarmicas;
}

// Exemplo de uso
$nome = "SeuNomeAqui";
$licoes = calculoLicoesCarmicas($nome);
print_r($licoes);
