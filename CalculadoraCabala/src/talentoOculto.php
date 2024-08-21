<?php

function reduzirParaUmDigito($numero)
{
    while ($numero >= 10 && $numero != 11 && $numero != 22) {
        $numero = array_sum(str_split($numero));
    }
    return $numero;
}

function reduzirTalentoOculto($numero)
{
    while ($numero >= 11) {
        $numero = array_sum(str_split($numero));
    }
    return $numero;
}

function talentoOculto($motivacao, $numeroDeExpressao)
{
    // Reduz os números de motivação e de expressão
    $mot = reduzirParaUmDigito($motivacao);
    $exp = reduzirParaUmDigito($numeroDeExpressao);

    // Soma os dois resultados
    $talentoOculto = $mot + $exp;

    // Verifica se o resultado é 10 ou 11 e retorna diretamente, sem redução, pois ambos existem em talentos ocultos
    if ($talentoOculto == 10 || $talentoOculto == 11) {
        return $talentoOculto;
    }
    // verificar se há resultado 22 que é um numero mestre considerado em mot e exp, porém não é considerado em talentos ocultos.
    if ($talentoOculto == 22) {
        return reduzirTalentoOculto($talentoOculto);
    }

    // Reduz o resultado final, se necessário
    return reduzirParaUmDigito($talentoOculto);
}

// Exemplo de uso:
$motivacao = 11;
$numeroDeExpressao = 11;
echo "Talento Oculto: " . talentoOculto($motivacao, $numeroDeExpressao);
