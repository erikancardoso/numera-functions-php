<?php
function arcanoVida($nomeCompleto, $dataNascimento) {
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
    
    // Extrair o número após o ponto decimal para usar como meses
    $mesesPorArcano = ($duracaoArcanoTotal - $anosPorArcano) * 10;
    $mesesPorArcano = (int) $mesesPorArcano; // Converte para inteiro para garantir que seja um valor inteiro

    // Definir a data inicial
    $inicioArcano = new DateTime($dataNascimento);

    $arcanoAtual = '';
    $dataAtual = new DateTime();

    for ($i = 0; $i < count($arcanos); $i++) {
        // Clonar a data de início para não modificar o objeto original
        $fimArcano = clone $inicioArcano;

        // Adicionar os anos e meses calculados
        $fimArcano->add(new DateInterval("P{$anosPorArcano}Y{$mesesPorArcano}M"));

        // Verificar se a data atual está no intervalo deste Arcano
        if ($dataAtual >= $inicioArcano && $dataAtual < $fimArcano) {
            $arcanoAtual = $arcanos[$i];
            break;
        }

        // Atualizar o início do próximo Arcano
        $inicioArcano = clone $fimArcano;
    }

    // Retornar o Arcano em que a pessoa está atualmente
    return [
        'arcanoAtual' => $arcanoAtual,
        'anosPorArcano' => $anosPorArcano,
        'mesesPorArcano' => $mesesPorArcano
    ];
}

// Exemplo de uso
$nomeCompleto = "wesley alves cardoso";
$dataNascimento = "1989-12-21";
$resultado = arcanoVida($nomeCompleto, $dataNascimento);

echo "Arcano: " . $resultado['arcanoAtual'] . "\n";
echo "Duração: " . $resultado['anosPorArcano'] . " anos e " . $resultado['mesesPorArcano'] . " meses\n";
