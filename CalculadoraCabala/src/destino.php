<?php

function calcularNumeroDeDestino($dia, $mes, $ano) {
    // Verifica se a entrada é válida
    if (!checkdate($mes, $dia, $ano)) {
        return "Data inválida";
    }

    // Função para separar e somar algarismos de um número
    function somarAlgarismos($numero) {
        return array_sum(str_split($numero));
    }

    // Função para reduzir um número a um único dígito ou número mestre
    function reduzirNumero($numero) {
        while ($numero > 9 && $numero != 11 && $numero != 22 && $numero != 33) {
            $numero = somarAlgarismos($numero);
        }
        return $numero;
    }

    // Reduzir os componentes individualmente
    $somaDia = reduzirNumero(somarAlgarismos($dia));
    $somaMes = reduzirNumero(somarAlgarismos($mes));
    $somaAno = reduzirNumero(somarAlgarismos($ano));

    // Soma dos resultados
    $somaTotal = $somaDia + $somaMes + $somaAno;

    // Reduzir a soma total
    $numeroDeDestino = reduzirNumero($somaTotal);

    // Verifica se o resultado é 11, 22 ou 33
    if (in_array($numeroDeDestino, [11, 22, 33])) {
        return $numeroDeDestino;
    } else {
        return reduzirNumero($numeroDeDestino);
    }
}

// Exemplo de uso
$dia = 30;
$mes = 10;
$ano = 1993;

echo "Número de Destino: " . calcularNumeroDeDestino($dia, $mes, $ano);

?>
