<?php

function arcanoVida($nomeCompleto, $dataNascimento)
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
        'y' => 1, 'Y' => 1, 'z' => 7, 'Z' => 7, 'ç' => 6, 'Ç' => 6,
        // Símbolos especiais
        'Á' => 3, 'à' => 3, 'À' => 3, 'â' => 8, 'Â' => 8, 'ä' => 3, 'Ä' => 3,
        'å' => 8, 'Å' => 8, 'ā' => 4, 'Ā' => 4, 'é' => 7, 'É' => 7, 'è' => 7,
        'È' => 7, 'ê' => 3, 'Ê' => 3, 'ë' => 7, 'Ë' => 7, 'ẽ' => 8, 'Ẽ' => 8,
        'í' => 3, 'Í' => 3, 'ì' => 3, 'Ì' => 3, 'î' => 8, 'Î' => 8, 'ï' => 3,
        'Ï' => 3, 'ĩ' => 4, 'Ĩ' => 4, 'ó' => 9, 'Ó' => 9, 'ò' => 9, 'Ò' => 9,
        'ô' => 5, 'Ô' => 5, 'õ' => 1, 'Õ' => 1, 'ö' => 9, 'Ö' => 9, 'ú' => 8,
        'Ú' => 8, 'ù' => 8, 'Ù' => 8, 'û' => 4, 'Û' => 4, 'ü' => 8, 'Ü' => 8,
        'ů' => 4, 'Ů' => 4, 'ū' => 9, 'Ū' => 9, 'ć' => 5, 'Ć' => 5, 'ĉ' => 1,
        'Ĉ' => 1, 'ñ' => 8, 'Ñ' => 8, 'ń' => 7, 'Ń' => 7, 'ś' => 5, 'Ś' => 5,
        'ŝ' => 1, 'Ŝ' => 1, 'ź' => 9, 'Ź' => 9, 'ģ' => 5, 'Ǵ' => 5
    ];

    // Converter o nome completo em números usando a tabela
    $numeros = [];
    $nomeArray = preg_split('//u', $nomeCompleto, -1, PREG_SPLIT_NO_EMPTY);

    // Iterar sobre cada letra do nome
    for ($i = 0; $i < count($nomeArray); $i++) {
        $letra = $nomeArray[$i];
        if (isset($tabela[$letra])) {
            $numeros[] = $tabela[$letra];
        }
    }

    // Função para calcular os arcanos
    $arcanos = [];
    for ($i = 0; $i < count($numeros) - 1; $i++) {
        $arcano = $numeros[$i] * 10 + $numeros[$i + 1];
        $arcanos[] = $arcano;
    }

    // Calcular a duração de cada Arcano
$numArcanos = count($arcanos);
$duracaoArcanoTotal = 90 / $numArcanos;
$anosPorArcano = floor($duracaoArcanoTotal);
$mesesDecimais = ($duracaoArcanoTotal - $anosPorArcano) * 12;
$mesesPorArcano = floor($mesesDecimais);
$diasPorArcano = (int)(($mesesDecimais - $mesesPorArcano) * 30.44); // Aproximamos para 30.44 dias por mês

// Definir a data inicial para cálculo de arcanos
$inicioArcano = new DateTime($dataNascimento);
$arcanosDetalhados = [];

for ($i = 0; $i < count($arcanos); $i++) {
    // Calcular a data de fim do arcano
    $fimArcano = clone $inicioArcano;
    $fimArcano->add(new DateInterval("P{$anosPorArcano}Y{$mesesPorArcano}M{$diasPorArcano}D"));

    // Calcular a idade da pessoa no início e fim do arcano
    $idadeInicio = $inicioArcano->diff(new DateTime($dataNascimento));
    $idadeFim = $fimArcano->diff(new DateTime($dataNascimento));

    // Adicionar o arcano com suas informações detalhadas
    $arcanosDetalhados[] = [
        'arcano' => $arcanos[$i],
        'inicio' => $inicioArcano->format('d-m-Y'),
        'fim' => $fimArcano->format('d-m-Y'),
        'idadeInicio' => "{$idadeInicio->y} anos, {$idadeInicio->m} meses e {$idadeInicio->d} dias",
        'idadeFim' => "{$idadeFim->y} anos, {$idadeFim->m} meses e {$idadeFim->d} dias"
    ];

    // Atualizar o início para o próximo arcano
    $inicioArcano = clone $fimArcano;
}

return [
    'arcanoAtual' => $arcanosDetalhados,
    'anosPorArcano' => $anosPorArcano,
    'mesesPorArcano' => $mesesPorArcano,
    'diasPorArcano' => $diasPorArcano,
];

}

// Exemplo de uso
$nomeCompleto = "yuri ramon secchi fridres";
$dataNascimento = "1999-09-19";
$resultado = arcanoVida($nomeCompleto, $dataNascimento);

echo "Detalhes dos Arcanos Destino, data e idade:\n";
foreach ($resultado['arcanoAtual'] as $detalhe) {
    echo "Arcano: " . $detalhe['arcano'] . "\n";
    echo "Início: " . $detalhe['inicio'] . "\n";
    echo "Fim: " . $detalhe['fim'] . "\n";
    echo "Idade Início: " . $detalhe['idadeInicio'] . "\n";
    echo "Idade Fim: " . $detalhe['idadeFim'] . "\n\n";
}
