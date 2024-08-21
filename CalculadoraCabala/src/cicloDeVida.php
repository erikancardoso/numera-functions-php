<?php
function calcularNumeroDestino($dataNascimento) {
    list($dia, $mes, $ano) = explode('-', $dataNascimento);
    $soma = array_sum(str_split($dia)) + array_sum(str_split($mes)) + array_sum(str_split($ano));
    while ($soma > 9 && $soma != 11 && $soma != 22) {
        $soma = array_sum(str_split($soma));
    }
    return $soma;
}

function calcularLicoesCarmicas($nome) {
    // Tabela de correspondência
    $tabela = [
        'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 8,
        'g' => 3, 'h' => 5, 'i' => 1, 'j' => 1, 'k' => 2, 'l' => 3,
        'm' => 4, 'n' => 5, 'o' => 7, 'p' => 8, 'q' => 1, 'r' => 2,
        's' => 3, 't' => 4, 'u' => 6, 'v' => 6, 'w' => 6, 'x' => 5,
        'y' => 1, 'z' => 7
    ];

    $contagemNumeros = array_fill(1, 9, 0);

    foreach (str_split(strtolower($nome)) as $letra) {
        if (isset($tabela[$letra])) {
            $contagemNumeros[$tabela[$letra]]++;
        }
    }

    $licoesCarmicas = [];
    for ($i = 1; $i <= 9; $i++) {
        if ($contagemNumeros[$i] == 0) {
            $licoesCarmicas[] = $i;
        }
    }

    return $licoesCarmicas;
}

function calcularCiclos($dataNascimento, $licoesCarmicas) {
    list($dia, $mes, $ano) = explode('-', $dataNascimento);

    $primeiroCiclo = ($mes != 11) ? array_sum(str_split($mes)) : $mes;
    $numeroDestino = calcularNumeroDestino($dataNascimento);
    $anoInicioPrimeiroCiclo = intval($ano);
    $anoFimPrimeiroCiclo = $anoInicioPrimeiroCiclo + (37 - $numeroDestino);
    $dataInicioPrimeiroCiclo = "{$dia}-{$mes}-{$anoInicioPrimeiroCiclo}";
    $dataFimPrimeiroCiclo = "{$dia}-{$mes}-{$anoFimPrimeiroCiclo}";

    $segundoCiclo = ($dia != 11 && $dia != 22) ? array_sum(str_split($dia)) : $dia;
    $anoInicioSegundoCiclo = $anoFimPrimeiroCiclo;
    $anoFimSegundoCiclo = $anoInicioSegundoCiclo + 27;
    $dataInicioSegundoCiclo = "{$dia}-{$mes}-{$anoInicioSegundoCiclo}";
    $dataFimSegundoCiclo = "{$dia}-{$mes}-{$anoFimSegundoCiclo}";

    $terceiroCiclo = ($ano != 11 && $ano != 22) ? array_sum(str_split($ano)) : $ano;
    $anoInicioTerceiroCiclo = $anoFimSegundoCiclo;
    $dataInicioTerceiroCiclo = "{$dia}-{$mes}-{$anoInicioTerceiroCiclo}";

    $ciclos = [
        '1º Ciclo' => [
            'Número' => $primeiroCiclo,
            'Período' => "{$dataInicioPrimeiroCiclo} - {$dataFimPrimeiroCiclo}"
        ],
        '2º Ciclo' => [
            'Número' => $segundoCiclo,
            'Período' => "{$dataInicioSegundoCiclo} - {$dataFimSegundoCiclo}"
        ],
        '3º Ciclo' => [
            'Número' => $terceiroCiclo,
            'Período' => "{$dataInicioTerceiroCiclo} - Até o fim da vida"
        ]
    ];

    $alertas = [];
    foreach ($ciclos as $nomeCiclo => $ciclo) {
        if (in_array($ciclo['Número'], $licoesCarmicas)) {
            $alertas[] = "Alerta: O {$nomeCiclo} (Número: {$ciclo['Número']}) coincide com uma Lição Cármica. Este período pode ser conturbado.";
        }
    }

    return [
        'ciclos' => $ciclos,
        'alertas' => $alertas
    ];
}

// Exemplo de uso:
$dataNascimento = '30-10-1993';
$nome = 'erika maria';
$licoesCarmicas = calcularLicoesCarmicas($nome);
$resultado = calcularCiclos($dataNascimento, $licoesCarmicas);

print_r($resultado['ciclos']);
print_r($resultado['alertas']);
