<?php
function piramideDestino($nomeCompleto, $dataNascimento)
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

    // Extrair o dia e o mês do nascimento do formato "dd-mm-yyyy"
    $partesData = explode("-", $dataNascimento);
    $diaNascimento = intval($partesData[0]);
    $mesNascimento = intval($partesData[1]);

    // Reduzir o dia e o mês
    $diaReducao = array_sum(str_split($diaNascimento));
    if ($diaReducao >= 10) {
        $diaReducao = array_sum(str_split($diaReducao));
    }

    $mesReducao = array_sum(str_split($mesNascimento));
    if ($mesReducao >= 10) {
        $mesReducao = array_sum(str_split($mesReducao));
    }

    // Somar as reduções e reduzir novamente se necessário
    $reducaoFinal = $diaReducao + $mesReducao;
    if ($reducaoFinal > 9) {
        $reducaoFinal = array_sum(str_split($reducaoFinal));
    }

    // Criar uma nova tabela deslocada de acordo com a redução final
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

    // Construir a pirâmide
    $piramide = [];
    $piramide[] = $numeros;

    while (count($numeros) > 1) {
        $novaLinha = [];
        for ($i = 0; $i < count($numeros) - 1; $i++) {
            $soma = $numeros[$i] + $numeros[$i + 1];
            $novaLinha[] = $soma >= 10 ? $soma - 9 : $soma;
        }
        $piramide[] = $novaLinha;
        $numeros = $novaLinha;
    }

    // Formatar a pirâmide em formato invertido
    $resultado = "";
    $maxLinha = count($piramide);
    for ($i = 0; $i < $maxLinha; $i++) {
        $espacos = str_repeat(" ", $i);
        $linha = implode(" ", $piramide[$i]);
        $resultado .= $espacos . $linha . "\n";
    }

    return $resultado;
}

function sequenciaVibracional($piramide)
{
    // Listas de sequências negativas e positivas
    $sequenciasNegativas = ['111', '222', '333', '444', '555', '666', '777', '888', '999'];
    $sequenciasPositivas = ['116', '118', '119', '123', '168', '252', '272', '375', '518', '575', '637', '651', '665', '667', '725', '757', '922', '923', '924', '926'];

    // Quebrar a pirâmide em linhas
    $linhas = explode("\n", trim($piramide));
    $resultadoFormatado = "";

    // Iterar por cada linha da pirâmide
    foreach ($linhas as $indice => $linha) {
        $numeros = explode(" ", trim($linha));
        $linhaFormatada = [];

        // Verificar cada número na linha
        foreach ($numeros as $numero) {
            if (in_array($numero, $sequenciasNegativas)) {
                // Destacar sequências negativas em negrito
                $linhaFormatada[] = "<strong>$numero</strong>";
            } elseif (in_array($numero, $sequenciasPositivas)) {
                // Destacar sequências positivas em itálico
                $linhaFormatada[] = "<em>$numero</em>";
            } else {
                // Manter número normal se não for sequência especial
                $linhaFormatada[] = $numero;
            }
        }

        // Adicionar os espaços para manter o formato de pirâmide invertida
        $espacos = str_repeat("&nbsp;", $indice * 2); // Multiplicar por 2 para aumentar o espaçamento visual
        $resultadoFormatado .= $espacos . implode(" ", $linhaFormatada) . "<br>";
    }

    return $resultadoFormatado;
}

// Exemplo de uso
$nomeCompleto = "Erika maria nascimento da silva cardoso";
$dataNascimento = "30-10-1993"; // Dia 30 reduzido para 3 e mês 10 reduzido para 1, soma 4
$piramide = piramideDestino($nomeCompleto, $dataNascimento);
echo sequenciaVibracional($piramide);
?>
