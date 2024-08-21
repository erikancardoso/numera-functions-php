<?php
function calculoDividasCarmicas($nomeCompleto, $dataNascimento) {
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

    // Função para calcular a soma reduzida
    function reduzirNumero($numero) {
        while ($numero > 9 && !in_array($numero, [11, 22, 33])) {
            $numero = array_sum(str_split($numero));
        }
        return $numero;
    }

    // Verificar dia de nascimento
    $diaNascimento = (int)date('d',  ($dataNascimento));
    $dividaCarmica = [];

    if (in_array($diaNascimento, [13, 14, 16, 19])) {
        $dividaCarmica[] = $diaNascimento;
    }

    // Calcular número de Destino (baseado na data de nascimento)
    $numerosData = array_sum(str_split(date('dmY', strtotime($dataNascimento))));
    $numeroDestino = reduzirNumero($numerosData);

    // Calcular número de Motivação (soma das vogais do nome)
    $vogais = ['a', 'e', 'i', 'o', 'u','y', 'A', 'E', 'I', 'O', 'U', 'Y'];
    $somaVogais = 0;
    foreach (str_split($nomeCompleto) as $letra) {
        if (in_array($letra, $vogais) && isset($tabela[$letra])) {
            $somaVogais += $tabela[$letra];
        }
    }
    $numeroMotivacao = reduzirNumero($somaVogais);

    // Calcular número de Expressão (soma de todas as letras do nome)
    $somaNome = 0;
    foreach (str_split($nomeCompleto) as $letra) {
        if (isset($tabela[$letra])) {
            $somaNome += $tabela[$letra];
        }
    }
    $numeroExpressao = reduzirNumero($somaNome);

    // Verificar se algum dos números de Destino, Motivação ou Expressão corresponde a uma Dívida Cármica
    $mapaDividas = [
        4 => 13,
        5 => 14,
        7 => 16,
        1 => 19
    ];

    if (isset($mapaDividas[$numeroDestino])) {
        $dividaCarmica[] = $mapaDividas[$numeroDestino];
    }
    if (isset($mapaDividas[$numeroMotivacao])) {
        $dividaCarmica[] = $mapaDividas[$numeroMotivacao];
    }
    if (isset($mapaDividas[$numeroExpressao])) {
        $dividaCarmica[] = $mapaDividas[$numeroExpressao];
    }

    // Remover duplicatas e ordenar os números
    $dividaCarmica = array_unique($dividaCarmica);
    sort($dividaCarmica);

    return !empty($dividaCarmica) ? implode(', ', $dividaCarmica) : 'Sem Dívida Cármica';
}

// Exemplo de uso
$nomeCompleto = "erika maria nascimento da silva cardoso";
$dataNascimento = "1995-07-24";
$resultado = calculoDividasCarmicas($nomeCompleto, $dataNascimento);
echo $resultado; //14
