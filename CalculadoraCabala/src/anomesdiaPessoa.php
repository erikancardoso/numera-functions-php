<?php

// Função para separar e somar algarismos de um número
function somarAlgarismos($numero) {
    return array_sum(str_split($numero));
}

// Função para reduzir um número a um único dígito ou número mestre
function reduzirNumero($numero) {
    while ($numero > 9) {
        $numero = somarAlgarismos($numero);
    }
    return $numero;
}

// Função para calcular o Ano Pessoal
function calcularAnoPessoal($diaNascimento, $mesNascimento, $anoAtual) {
    // Obtém a data de hoje
    $dataHoje = new DateTime();

    // Cria a data do aniversário para este ano
    $dataAniversarioAtual = new DateTime("$anoAtual-$mesNascimento-$diaNascimento");

    // Se a data de aniversário ainda não ocorreu neste ano, usa o ano anterior
    if ($dataHoje < $dataAniversarioAtual) {
        $anoUso = $anoAtual - 1;
    } else {
        $anoUso = $anoAtual;
    }
    echo " anoBaseIntencao ". $anoUso . " anoIntencaoAtual ". $anoAtual . PHP_EOL;

    // Reduzir o dia e o mês do nascimento
    $diaReduzido = reduzirNumero(somarAlgarismos($diaNascimento));
    $mesReduzido = reduzirNumero(somarAlgarismos($mesNascimento));

    // Reduzir o ano de interesse (ano em uso)
    $anoReduzido = reduzirNumero(somarAlgarismos($anoUso));

    // Somar os valores reduzidos
    $anoPessoal = reduzirNumero($diaReduzido + $mesReduzido + $anoReduzido);

    return $anoPessoal;
}

// Função para calcular o Mês Pessoal
function calcularMesPessoal($diaNascimento, $mesNascimento, $anoAtual) {
    // Obtém o mês atual
    $mesAtual = (int) date('m');
    echo "Mês atual: ". $mesAtual.PHP_EOL ;
    // Calcula o Ano Pessoal
    $anoPessoal = calcularAnoPessoal($diaNascimento, $mesNascimento, $anoAtual);

    // Soma o mês atual ao Ano Pessoal
    $mesPessoal = reduzirNumero($mesAtual + $anoPessoal);

    return $mesPessoal;
}

// Função para calcular o Dia Pessoal
function calcularDiaPessoal($anoAtual, $mesPessoal) {
    // Obtém o dia atual
    $diaAtual = (int) date('d');
    echo " Dia atual: ". $diaAtual .PHP_EOL;
    // Soma o dia atual ao Mês Pessoal
    $diaPessoal = reduzirNumero($diaAtual + $mesPessoal);

    return $diaPessoal;
}

// Exemplo de uso
$diaNascimento = 30;
$mesNascimento = 10; // Outubro
$anoAtual = date('Y'); // Ano atual
$mesPessoal = calcularMesPessoal($diaNascimento, $mesNascimento, $anoAtual);
$diaPessoal = calcularDiaPessoal($anoAtual, $mesPessoal);

echo "Ano Pessoal: " . calcularAnoPessoal($diaNascimento, $mesNascimento, $anoAtual) . PHP_EOL;
echo "Mês Pessoal: " . $mesPessoal . PHP_EOL;
echo "Dia Pessoal: " . $diaPessoal. PHP_EOL ;
?>
