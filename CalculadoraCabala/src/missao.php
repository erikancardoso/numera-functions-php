<?php

function reduzirNumero($numero)
{
    // Função para reduzir um número a um dígito, exceto para 11 e 22
    while ($numero > 9 && $numero != 11 && $numero != 22) {
        $soma = 0;
        foreach (str_split($numero) as $digito) {
            $soma += intval($digito);
        }
        $numero = $soma;
    }
    return $numero;
}

function calcularNumeroMissao($numero_destino, $numero_expressao)
{
    $soma = $numero_destino + $numero_expressao;
    $numero_missao = reduzirNumero($soma);
    return $numero_missao;
}

// Exemplo de uso:
$numero_destino = calcularNumeroDeDestino(30,10,1993); // puchar função calculoNumeroDestino
$numero_expressao = calcularNumeroExpressao('erika maria nascimento da silva'); // puchar função calculoNumeroExpressao

$numero_missao = calcularNumeroMissao($numero_destino, $numero_expressao);
echo "O número da Missão é: " . $numero_missao;

