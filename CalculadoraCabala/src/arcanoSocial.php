<?php
function arcanoSocial($nomeCompleto, $dataNascimento)
{
    // Tabela base de correspondência de letras para números
    $tabelaBase = [
        1 => ['a', 'A', 'i', 'I', 'j', 'J', 'q', 'Q', 'y', 'Y', 'ĉ', 'Ĉ', 'Ŝ', 'ŝ', 'õ', 'Õ'],
        2 => ['b', 'B', 'k', 'K', 'r', 'R'],
        3 => ['c', 'C', 'g', 'G', 'l', 'L', 's', 'S', 'Á', 'á', 'à', 'À', 'ä', 'Ä', 'ê', 'Ê', 'í', 'Í', 'ì', 'Ì', 'ï', 'Ï'],
        4 => ['d', 'D', 'm', 'M', 't', 'T', 'ã', 'Ã', 'ĩ', 'Ĩ', 'û', 'Û', 'ů', 'Ů'],
        5 => ['e', 'E', 'h', 'H', 'n', 'N', 'x', 'X'],
        6 => ['u', 'U', 'v', 'V', 'w', 'W', 'ç', 'Ç'],
        7 => ['o', 'O', 'z', 'Z', 'é', 'É', 'è', 'È', 'ë', 'Ë'],
        8 => ['f', 'F', 'p', 'P', 'å', 'Å', 'â', 'Â', 'ẽ', 'Ẽ', 'î', 'Î', 'ú', 'Ú', 'ù', 'Ù', 'ü', 'Ü'],
        9 => ['ó', 'Ó', 'ò', 'ö', 'Ö', 'Ò', 'ź', 'Ź', 'ū', 'Ū']
    ];

    // Extrair o dia do nascimento do formato "dd-mm-yyyy"
    $partesData = explode("-", $dataNascimento);
    $mesNascimento = intval($partesData[1]); // pegar mes nascimento
    
    // Extrair o mês do nascimento
    $mesReducao = array_sum(str_split($mesNascimento));
    if ($mesReducao > 9) {
        $mesReducao = array_sum(str_split($mesReducao));
    }

    // Criar uma nova tabela deslocada de acordo com a redução do dia
    $tabelaDeslocada = [];
    $tamanhoTabela = count($tabelaBase);

    foreach ($tabelaBase as $posicao => $letras) {
        $novaPosicao = ($posicao + $mesReducao - 1) % $tamanhoTabela + 1;
        $tabelaDeslocada[$novaPosicao] = $letras;
    }

    // Variáveis para soma e sequência
    $soma = 0;
    $sequencia = "";

    // Convertendo o nome para um array de caracteres considerando codificação UTF-8
    $nomeArray = preg_split('//u', $nomeCompleto, -1, PREG_SPLIT_NO_EMPTY);

    // Definição dos símbolos especiais utilizando seus códigos UTF-8
    $simbolosEspeciais1 = ["\xC2\xA8", "\x60", "\xC2\xB4", "\x27"]; // Trema, Crase, Agudo, Apóstrofo
    $simbolosEspeciais2 = ["\xC2\xB0", "\x5E"]; // Grau e Circunferência
    $simbolosEspeciais3 = ["\x7E"]; // Til

    // Iterar sobre cada letra do nome
    for ($i = 0; $i < count($nomeArray); $i++) {
        $letra = $nomeArray[$i];
        $valorLetra = 0;

        // Procurar o valor da letra na tabela deslocada
        foreach ($tabelaDeslocada as $numero => $letras) {
            if (in_array($letra, $letras)) {
                $valorLetra = $numero;
                break;
            }
        }

        // Verificar se há símbolos especiais à esquerda da letra atual
        if ($i > 0) {
            $simboloAnterior = $nomeArray[$i - 1];
            
            // Verificar presença de símbolos do grupo 1
            if (in_array($simboloAnterior, $simbolosEspeciais1)) {
                $valorLetra += 2;
            }

            // Verificar presença de símbolos do grupo 2
            if (in_array($simboloAnterior, $simbolosEspeciais2)) {
                $valorLetra += 7;
            }

            // Verificar presença de símbolos do grupo 3
            if (in_array($simboloAnterior, $simbolosEspeciais3)) {
                $valorLetra += 3;
            }

            // Aplicar redução teosófica se o valor da letra modificada for maior que 9
            while ($valorLetra > 9) {
                $valorLetra = array_sum(str_split($valorLetra));
            }
        }

        // Atualizar a soma total e a sequência de valores
        $soma += $valorLetra;
        $sequencia .= $valorLetra > 0 ? $valorLetra : '';
    }

    // Reduzir a soma a um único dígito ou número mestre
    while ($soma > 9 && $soma != 11 && $soma != 22) {
        $soma = array_sum(str_split($soma));
    }

    // Converter o nome completo em números usando a tabela deslocada
    $numeros = [];
    foreach ($nomeArray as $letra) {
        foreach ($tabelaDeslocada as $numero => $letras) {
            if (in_array($letra, $letras)) {
                $numeros[] = $numero;
                break;
            }
        }
    }

    // Gerar a sequência de Arcanos
    $arcanos = [];
    for ($i = 0; $i < count($numeros) - 1; $i++) {
        $arcano = $numeros[$i] * 10 + $numeros[$i + 1];
        $arcanos[] = $arcano;
    }

    // Calcular a duração de cada Arcano
    $numArcanos = count($arcanos);
    $duracaoArcanoTotal = 90 / $numArcanos;
    $anosPorArcano = floor($duracaoArcanoTotal);
    $mesesPorArcano = ($duracaoArcanoTotal - $anosPorArcano) * 12;
    $mesesPorArcano = (int)$mesesPorArcano;

    // Definir a data inicial
    $inicioArcano = new DateTime($dataNascimento);
    $arcanosDetalhados = [];

    for ($i = 0; $i < count($arcanos); $i++) {
        // Calcular a data de fim do arcano
        $fimArcano = clone $inicioArcano;
        $fimArcano->add(new DateInterval("P{$anosPorArcano}Y{$mesesPorArcano}M"));

        // Calcular a idade da pessoa no início e fim do arcano
        $idadeInicio = $inicioArcano->diff(new DateTime($dataNascimento));
        $idadeFim = $fimArcano->diff(new DateTime($dataNascimento));

        // Adicionar o arcano com suas informações detalhadas
        $arcanosDetalhados[] = [
            'arcano' => $arcanos[$i],
            'inicio' => $inicioArcano->format('d-m-Y'),
            'fim' => $fimArcano->format('d-m-Y'),
            'idadeInicio' => "{$idadeInicio->y} anos e {$idadeInicio->m} meses",
            'idadeFim' => "{$idadeFim->y} anos e {$idadeFim->m} meses"
        ];

        // Atualizar o início para o próximo arcano
        $inicioArcano = clone $fimArcano;
    }

    return [
        'arcanoAtual' => $arcanosDetalhados,
        'anosPorArcano' => $anosPorArcano,
        'mesesPorArcano' => $mesesPorArcano,
        'numeroExpressao' => $soma,
        'sequencia' => $sequencia
    ];
}

// Exemplo de uso
$nomeCompleto = "Erika Maria nascimento da Silva cardoso";
$dataNascimento = "30-10-1993";
$resultado = arcanoSocial($nomeCompleto, $dataNascimento);

echo "Detalhes dos Arcanos em Datas e idade:\n";
foreach ($resultado['arcanoAtual'] as $detalhe) {
    echo "Arcano: " . $detalhe['arcano'] . "\n";
    echo "Início: " . $detalhe['inicio'] . "\n";
    echo "Fim: " . $detalhe['fim'] . "\n";
    echo "Idade Início: " . $detalhe['idadeInicio'] . "\n";
    echo "Idade Fim: " . $detalhe['idadeFim'] . "\n\n";
}
