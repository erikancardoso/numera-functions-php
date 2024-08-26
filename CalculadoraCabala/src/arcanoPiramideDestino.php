<?php
function arcanoPiramideDestino($nomeCompleto, $dataNascimento)
{
    // Tabela base de correspondência de letras para números
    $tabelaBase = [
        1 => ['a', 'A', 'i', 'I', 'j', 'J', 'q', 'Q', 'y', 'Y'],
        2 => ['b', 'B', 'k', 'K', 'r', 'R'],
        3 => ['c', 'C', 'g', 'G', 'l', 'L', 's', 'S'],
        4 => ['d', 'D', 'm', 'M', 't', 'T'],
        5 => ['e', 'E', 'h', 'H', 'n', 'N', 'x', 'X'],
        6 => ['u', 'U', 'v', 'V', 'w', 'W', 'ç', 'Ç'],
        7 => ['o', 'O', 'z', 'Z'],
        8 => ['f', 'F', 'p', 'P'],
        9 => [] // Posicionamento de letras adicionadas ou modificadas
    ];

    // Extrair o dia do nascimento do formato "dd-mm-yyyy"
    $partesData = explode("-", $dataNascimento);
    $diaNascimento = intval($partesData[0]);
    $mesNascimento = intval($partesData[1]); 
    
    // reduz o dia
     $diaReducao = array_sum(str_split($diaNascimento));
    if ($diaReducao > 9 ) {
        $diaReducao = array_sum(str_split($diaReducao));
    }
    
    // reduz o mes
    $mesReducao = array_sum(str_split($mesNascimento));
    if ($mesReducao > 9) {
        $mesReducao = array_sum(str_split($mesReducao));
    }
    // soma dia e mes nascimento reduzido, e reduz se necessário
    $reducaoFinal = $diaReducao + $mesReducao;
    if ($reducaoFinal > 9) {
        $reducaoFinal = array_sum(str_split($reducaoFinal));
    }

    // Criar uma nova tabela deslocada de acordo com a redução do dia
    $tabelaDeslocada = [];
    $tamanhoTabela = count($tabelaBase);

    foreach ($tabelaBase as $posicao => $letras) {
        $novaPosicao = ($posicao + $reducaoFinal - 1) % $tamanhoTabela + 1;
        $tabelaDeslocada[$novaPosicao] = $letras;
    }

    // Converter o nome completo em números usando a tabela deslocada
    $numeros = [];
    for ($i = 0; $i < strlen($nomeCompleto); $i++) {
        $letra = $nomeCompleto[$i];
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

    // Extrair o número após o ponto decimal para usar como meses
    $mesesPorArcano = ($duracaoArcanoTotal - $anosPorArcano) * 12;
    $mesesPorArcano = (int)$mesesPorArcano; // Converte para inteiro para garantir que seja um valor inteiro

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
$nomeCompleto = "Erika Maria nascimento da silva cardoso";
$dataNascimento = "30-10-1993"; // Dia 30 reduzido para 3
$resultado = arcanoPiramideDestino($nomeCompleto, $dataNascimento); //57

echo "Arcano Piramide Destino: " . $resultado['arcanoAtual'] . "\n"; 
echo "Duração: " . $resultado['anosPorArcano'] . " anos e " . $resultado['mesesPorArcano'] . " meses\n";
?>
