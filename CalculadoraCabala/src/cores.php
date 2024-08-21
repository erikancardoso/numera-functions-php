<?php

function calcularNumeroExpressao($nomeCompleto)
{
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

    // Calcular número de Expressão (soma de todas as letras do nome)
    $somaNome = 0;
    foreach (str_split($nomeCompleto) as $letra) {
        if (isset($tabela[$letra])) {
            $somaNome += $tabela[$letra];
        }
    }

    // Função para calcular a soma reduzida
    function reduzirNumero($numero)
    {
        while ($numero > 9 && !in_array($numero, [11, 22])) {
            $numero = array_sum(str_split($numero));
        }
        return $numero;
    }

    return reduzirNumero($somaNome);
}

function coresFavoraveis($nomeCompleto)
{
    // Mapeamento de cores favoráveis para cada número de Expressão
    $cores = [
        1 => ['Todos os tons de amarelo', 'laranja', 'castanho', 'dourado', 'verde', 'creme', 'branco'],
        2 => ['Todos os tons de verde', 'creme', 'branco', 'cinza'],
        3 => ['violeta', 'vinho', 'púrpura', 'vermelho'],
        4 => ['azul', 'cinza', 'púrpura', 'ouro'],
        5 => ['Todos os tons claros', 'cinza', 'prateado'],
        6 => ['rosa', 'azul', 'verde'],
        7 => ['verde', 'amarelo', 'branco', 'cinza', 'azul-claro'],
        8 => ['púrpura', 'cinza', 'azul', 'preto', 'castanho'],
        9 => ['vermelho', 'rosa', 'coral', 'vinho'],
        11 => ['branco', 'violeta', 'cores claras'],
        22 => ['violeta', 'branco', 'cores claras']
    ];

    // Calcular o número de Expressão
    $numeroExpressao = calcularNumeroExpressao($nomeCompleto);

    // Retornar as cores favoráveis para o número de Expressão
    return isset($cores[$numeroExpressao])
        ? 'Cores favoráveis: ' . implode(', ', $cores[$numeroExpressao])
        : 'Nenhuma cor favorável encontrada para este número de Expressão';
}

// Exemplo de uso
$nomeCompleto = "erika maria nascimento da silva cardoso";
$resultado = coresFavoraveis($nomeCompleto);
echo $resultado; //5
