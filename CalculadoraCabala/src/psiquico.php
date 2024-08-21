<?php

function calcularNumeroPsiquico($diaNascimento)
{
    // Certifica-se de que o dia de nascimento seja um número inteiro
    if (!is_numeric($diaNascimento) || $diaNascimento <= 0) {
        return "O dia de nascimento deve ser um número positivo.";
    }

    // Função para somar os dígitos de um número
    function somaDigitos($numero)
    {
        $soma = 0;
        while ($numero > 0) {
            $soma += $numero % 10;
            $numero = intdiv($numero, 10);
        }
        return $soma;
    }

    // Calcula o número psíquico
    $resultado = $diaNascimento;

    while ($resultado > 9) {
        $resultado = somaDigitos($resultado);
    }

    return $resultado;
}

// Exemplo de uso
$diaNascimento = 30; // Substitua pelo dia de nascimento desejado
$numeroPsiquico = calcularNumeroPsiquico($diaNascimento);
echo "O número psíquico é: " . $numeroPsiquico;

