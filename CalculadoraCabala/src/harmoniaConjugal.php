<?php
function reduzirNumero($numero)
{
    // Função para reduzir um número a um dígito, exceto para 11 e 22
    while ($numero > 9) {
        $soma = 0;
        foreach (str_split($numero) as $digito) {
            $soma += intval($digito);
        }
        $numero = $soma;
    }
    return $numero;
}

function calcularNumeroAmor($numero_destino, $numero_expressao)
{
    $soma = $numero_destino + $numero_expressao;
    $numero_missao = reduzirNumero($soma);
    return $numero_missao;
}

// Tabela de significados para cada número
$tabelaNumeros = [
    1 => [
        'Vibra com' => '9',
        'Atrai' => '4 e 8',
        'É oposto' => '6 e 7',
        'É passivo em relação a' => '2, 3 e 5'
    ],
    2 => [
        'Vibra com' => '8',
        'Atrai' => '7 e 9',
        'É oposto a' => '5',
        'É passivo em relação a' => '1, 3, 4 e 6'
    ],
    3 => [
        'Vibra com' => '7',
        'Atrai' => '5, 6 e 9',
        'É oposto a' => '4 e 8',
        'É passivo em relação a' => '1 e 2'
    ],
    4 => [
        'Vibra com' => '6',
        'Atrai' => '1 e 8',
        'É oposto a' => '3 e 5',
        'É passivo em relação a' => '2, 7 e 9'
    ],
    5 => [
        'Vibra com' => '5',
        'Atrai' => '3 e 9',
        'É oposto a' => '2 e 4; profundamente oposto a 6',
        'É passivo em relação a' => '1, 7 e 8'
    ],
    6 => [
        'Vibra com' => '4',
        'Atrai' => '3, 7 e 9',
        'É oposto a' => '1 e 8; profundamente oposto a 5',
        'É passivo em relação a' => '2'
    ],
    7 => [
        'Vibra com' => '3',
        'Atrai' => '2 e 6',
        'É oposto a' => '1 e 9',
        'É passivo em relação a' => '4, 5 e 8'
    ],
    8 => [
        'Vibra com' => '2',
        'Atrai' => '1 e 4',
        'É oposto a' => '3 e 6',
        'É passivo em relação a' => '5, 7 e 9'
    ],
    9 => [
        'Vibra com' => '1',
        'Atrai' => '2,3,5 e 6',
        'É oposto a' => '7',
        'É passivo em relação a' => '4 e 8'
    ],
];

// Exemplo de uso:
$numero_destino = 8; // puchar função calculoNumeroDestino
$numero_expressao = 5; // puchar função calculoNumeroExpressao

$numero_amor = calcularNumeroAmor($numero_destino, $numero_expressao);

if (isset($tabelaNumeros[$numero_amor])) {
    echo "O número da Harmonia Conjugal é: " . $numero_amor . PHP_EOL;
    echo "Vibra com: " . $tabelaNumeros[$numero_amor]['Vibra com'] .  PHP_EOL;
    echo "Atrai: " . $tabelaNumeros[$numero_amor]['Atrai'] .  PHP_EOL;
    echo "É oposto a: " . $tabelaNumeros[$numero_amor]['É oposto a'] .  PHP_EOL;
    echo "É passivo em relação a: " . $tabelaNumeros[$numero_amor]['É passivo em relação a'] .  PHP_EOL;
} else {
    echo "Número da Harmonia Conjugal não encontrado na tabela.";
}
?>
