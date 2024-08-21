<?php


function relacoesIntervalores($nomeCompleto)
{
    $tabela = [
        'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 8,
        'g' => 3, 'h' => 5, 'i' => 1, 'j' => 1, 'k' => 2, 'l' => 3,
        'm' => 4, 'n' => 5, 'o' => 7, 'p' => 8, 'q' => 1, 'r' => 2,
        's' => 3, 't' => 4, 'u' => 6, 'v' => 6, 'w' => 6, 'x' => 5,
        'y' => 1, 'z' => 7
    ];

    // Extrair o primeiro nome
    $primeiroNome = explode(' ', trim($nomeCompleto))[0];
    $primeiroNome = strtolower($primeiroNome); // Converter para minúsculas para corresponder à tabela

    // Converter o nome para números usando a tabela
    $numeros = [];
    foreach (str_split($primeiroNome) as $letra) {
        if (isset($tabela[$letra])) {
            $numeros[] = $tabela[$letra];
        }
    }

    // Contar quantas vezes cada número aparece
    $contagemNumeros = array_count_values($numeros);

    // Verificar se há algum número que aparece mais de uma vez
    $grupos = [];
    foreach ($contagemNumeros as $numero => $contagem) {
        if ($contagem > 1) {
            $grupos[$numero] = $contagem;
        }
    }

    // Determinar a relação intervalor
    if (count($grupos) === 1) {
        $numeroMaisRepetido = array_key_first($grupos);
        return  $numeroMaisRepetido; // caso tenha relação intervalor, aparece apenas o numero referente.
    } else {
        return "Nenhuma relação intervalor";
    }
}

// Exemplos de uso
echo relacoesIntervalores("carlos oliveira castro"); // puxar variavel nome
