<?php

function calcularAssinaturaImpressao($nomeCompleto)
{
    // Definindo a tabela completa de valores das letras dentro da função
    $alfabetoConsoantes = array(
        'b' => 2, 'B' => 2, 'c' => 3, 'C' => 3, 'd' => 4, 'D' => 4,
        'f' => 8, 'F' => 8, 'g' => 3, 'G' => 3, 'h' => 5, 'H' => 5,
        'j' => 1, 'J' => 1, 'k' => 2, 'K' => 2, 'l' => 3, 'L' => 3,
        'm' => 4, 'M' => 4, 'n' => 5, 'N' => 5, 'p' => 8, 'P' => 8,
        'q' => 1, 'Q' => 1, 'r' => 2, 'R' => 2, 's' => 3, 'S' => 3, 't' => 4, 'T' => 4,
        'v' => 6, 'V' => 6, 'w' => 6, 'W' => 6, 'x' => 5, 'X' => 5,
        'y' => 1, 'Y' => 1, 'z' => 7, 'Z' => 7, 'ç' => 6, 'Ç' => 6,
        'ć' => 5, 'Ć' => 5, 'ĉ' => 1, 'Ĉ' => 1, 'ñ' => 8, 'Ñ' => 8, 'ń' => 7,
        'Ń' => 7, 'ś' => 5, 'Ś' => 5, 'ŝ' => 1, 'Ŝ' => 1, 'ź' => 9, 'Ź' => 9,
        'ģ' => 5, 'Ǵ' => 5 
    );

    $soma = 0;
    $sequencia = "";
    // Convertendo o nome para um array de caracteres considerando codificação UTF-8
    $nomeArray = preg_split('//u', $nomeCompleto, -1, PREG_SPLIT_NO_EMPTY);

  // Definição dos símbolos especiais utilizando seus códigos UTF-8
    $simbolosEspeciais1 = ["\xC2\xA8", "\x60", "\xC2\xB4", "\x27"]; // Trema, Crase, Agudo, Apóstrofo
    $simbolosEspeciais2 = ["\xC2\xB0", "\x5E"]; // Grau e Circunferência
    $simbolosEspeciais3 = ["\x7E"]; // Til

     // Iterar sobre cada letra do nome
    for ($i = 0; $i < count($nomeArray); $i++) {
        $letra = $nomeArray[$i];
        $valorLetra = isset($alfabetoConsoantes[$letra]) ? $alfabetoConsoantes[$letra] : 0;

        // Verificar se há símbolos especiais à esquerda da letra atual
        if ($i > 0) {
            $simboloAnterior = $nomeArray[$i - 1];
            
            // Verificar presença de símbolos do grupo 1
            if (in_array($simboloAnterior, $simbolosEspeciais1)) {
                $valorLetra += 2;
                // Aplicar redução teosófica se o valor da letra modificada for maior que 9
                while ($valorLetra > 9) {
                    $valorLetra = array_sum(str_split($valorLetra));
                }
            }

            // Verificar presença de símbolos do grupo 2
            if (in_array($simboloAnterior, $simbolosEspeciais2)) {
                $valorLetra += 7;
                // Aplicar redução teosófica se o valor da letra modificada for maior que 9
                while ($valorLetra > 9) {
                    $valorLetra = array_sum(str_split($valorLetra));
                }
            }

            // Verificar presença de símbolos do grupo 3
            if (in_array($simboloAnterior, $simbolosEspeciais3)) {
                $valorLetra += 3;
                // Aplicar redução teosófica se o valor da letra modificada for maior que 9
                while ($valorLetra > 9) {
                    $valorLetra = array_sum(str_split($valorLetra));
                }
            }
        }

  // Atualizar a soma total e a sequência de valores
        $soma += $valorLetra;
        $sequencia .= $valorLetra > 0 ? $valorLetra : '';
    }

    // Reduzir a soma a um único dígito ou número mestre
    while ($soma > 9 && $soma != 11 && $soma != 22) {
        $soma = array_sum(str_split($soma));
    }

    return ['numeroImpressao' => $soma, 'sequencia' => $sequencia];
}


/// Exemplo de uso
$nomeCompleto = "Erika maria Ǵaź";
$resultado = calcularAssinaturaImpressao($nomeCompleto);
echo "O Número de Impressção para $nomeCompleto é: " . $resultado['numeroImpressao'] . "\n";
echo "Sequência de Algarismos: " . $resultado['sequencia'];
?>

