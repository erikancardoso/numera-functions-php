<?php
function piramidePessoal($nomeCompleto, $dataNascimento)
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

    // Extrair o mês do nascimento do formato "dd-mm-yyyy"
    $partesData = explode("-", $dataNascimento);
    $mesNascimento = intval($partesData[1]); // Pegar o mês
    $mesReducao = array_sum(str_split($mesNascimento)); // Reduzir o mês
    if ($mesReducao >= 10) {
        $mesReducao = array_sum(str_split($mesReducao));
    }

    // Criar uma nova tabela deslocada de acordo com a redução do mês
    $tabelaDeslocada = [];
    $tamanhoTabela = count($tabelaBase);

    foreach ($tabelaBase as $posicao => $letras) {
        $novaPosicao = ($posicao + $mesReducao - 1) % $tamanhoTabela + 1;
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

    // Formatar a pirâmide
    $resultado = "";
    $maxLinha = count($piramide);
    for ($i = 0; $i < $maxLinha; $i++) {
        $espacos = str_repeat(" ", $i);
        $linha = implode(" ", $piramide[$i]);
        $resultado .= $espacos . $linha . "\n";
    }

    return $resultado;
}

// Exemplo de uso
$nomeCompleto = "Erika maria nascimento da silva cardoso";
$dataNascimento = "30-10-1993"; // Mês 10 reduzido para 1
echo "" . piramidePessoal($nomeCompleto, $dataNascimento) . "";
?>

