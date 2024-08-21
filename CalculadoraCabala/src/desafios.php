<?php

function calcularDesafios($dataDeNascimento)
{
    // Extrair dia, mês e ano da data de nascimento
    list($dia, $mes, $ano) = explode('/', $dataDeNascimento);

    // Reduzir o dia
    $reduzirDia = array_sum(str_split($dia));
    while ($reduzirDia > 9 && $reduzirDia != 11 && $reduzirDia != 22) {
        $reduzirDia = array_sum(str_split($reduzirDia));
    }

    // Reduzir o mês
    $reduzirMes = array_sum(str_split($mes));
    while ($reduzirMes > 9 && $reduzirMes != 11 && $reduzirMes != 22) {
        $reduzirMes = array_sum(str_split($reduzirMes));
    }

    // Reduzir o ano
    $reduzirAno = array_sum(str_split($ano));
    while ($reduzirAno > 9 && $reduzirAno != 11 && $reduzirAno != 22) {
        $reduzirAno = array_sum(str_split($reduzirAno));
    }

    // Calcular os desafios
    $primeiroDesafio = abs($reduzirMes - $reduzirDia);
    $segundoDesafio = abs($reduzirAno - $reduzirDia);
    $terceiroDesafio = abs($segundoDesafio - $primeiroDesafio);

    // Reduzir os desafios para valores de 1 a 9 (ou 0)
    $primeiroDesafio = $primeiroDesafio % 9 ?: 9;
    $segundoDesafio = $segundoDesafio % 9 ?: 9;
    $terceiroDesafio = $terceiroDesafio % 9 ?: 9;

    // Caso algum desafio seja "11" ou "22", reduzir para "2" e "4" respectivamente
    $primeiroDesafio = ($primeiroDesafio == 11) ? 2 : (($primeiroDesafio == 22) ? 4 : $primeiroDesafio);
    $segundoDesafio = ($segundoDesafio == 11) ? 2 : (($segundoDesafio == 22) ? 4 : $segundoDesafio);
    $terceiroDesafio = ($terceiroDesafio == 11) ? 2 : (($terceiroDesafio == 22) ? 4 : $terceiroDesafio);

    return [
        'primeiroDesafio' => $primeiroDesafio,
        'segundoDesafio' => $segundoDesafio,
        'terceiroDesafio' => $terceiroDesafio
    ];
}

// Exemplo de uso
$dataDeNascimento = '01/05/1979';
$desafios = calcularDesafios($dataDeNascimento);

echo "Primeiro Desafio: " . $desafios['primeiroDesafio'] . "\n";
echo "Segundo Desafio: " . $desafios['segundoDesafio'] . "\n";
echo "Terceiro Desafio: " . $desafios['terceiroDesafio'] . "\n";
