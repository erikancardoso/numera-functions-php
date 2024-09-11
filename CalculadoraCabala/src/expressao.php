<?php

function calcularExpressao($nomeCompleto)
{
    // Tabela do alfabeto atualizada com letras acentuadas e suas variações
    $alfabeto = array(
        'a' => 1, 'A' => 1, 'b' => 2, 'B' => 2, 'c' => 3, 'C' => 3,
        'd' => 4, 'D' => 4, 'e' => 5, 'E' => 5, 'f' => 8, 'F' => 8,
        'g' => 3, 'G' => 3, 'h' => 5, 'H' => 5, 'i' => 1, 'I' => 1,
        'j' => 1, 'J' => 1, 'k' => 2, 'K' => 2, 'l' => 3, 'L' => 3,
        'm' => 4, 'M' => 4, 'n' => 5, 'N' => 5, 'o' => 7, 'O' => 7,
        'p' => 8, 'P' => 8, 'q' => 1, 'Q' => 1, 'r' => 2, 'R' => 2,
        's' => 3, 'S' => 3, 't' => 4, 'T' => 4, 'u'=> 6, 'U' => 6,
        'v' => 6, 'V' => 6, 'w' => 6, 'W' => 6, 'x' => 5, 'X' => 5,
        'y' => 1, 'Y' => 1, 'z' => 7, 'Z' => 7, 'ç' => 6, 'Ç' => 6,
        // Acrescentar símbolos especiais
        'Á' => 3,'à' => 3, 'À' => 3,'â' => 8, 'Â' => 8,'ä' => 3, 'Ä' => 3,'å' => 8, 
        'Å' => 8,'ā' => 4, 'Ā' => 4,'é' => 7, 'É' => 7,'è' => 7, 'È' => 7,'ê' => 3, 
        'Ê' => 3,'ë' => 7, 'Ë' => 7,'ẽ' => 8, 'Ẽ' => 8,'í' => 3, 'Í' => 3,'ì' => 3, 
        'Ì' => 3,'î' => 8, 'Î' => 8,'ï' => 3, 'Ï' => 3,'ĩ' => 4, 'Ĩ' => 4,'ó' => 9, 
        'Ó' => 9,'ò' => 9, 'Ò' => 9,'ô' => 5, 'Ô' => 5,'õ' => 1, 'Õ' => 1,'ö' => 9, 
        'Ö' => 9,'ú' => 8, 'Ú' => 8,'ù' => 8, 'Ù' => 8,'û' => 4, 'Û' => 4, 'ü' => 8,
        'Ü' => 8,'ů' => 4, 'Ů' => 4,'ū' => 9, 'Ū' => 9, 
        'ć' => 5, 'Ć' => 5, 'ĉ' => 1, 'Ĉ' => 1, 'ñ' => 8, 'Ñ' => 8, 'ń' => 7,
        'Ń' => 7, 'ś' => 5, 'Ś' => 5, 'ŝ' => 1, 'Ŝ' => 1, 'ź' => 9, 'Ź' => 9,
        'ģ' => 5, 'Ǵ' => 5 
    );

    $soma = 0;

    // Convertendo o nome para um array de caracteres considerando codificação UTF-8
    $nomeArray = preg_split('//u', $nomeCompleto, -1, PREG_SPLIT_NO_EMPTY);

    // Definição dos símbolos especiais utilizando seus códigos UTF-8
    $simbolosEspeciais1 = ["\xC2\xA8", "\x60", "\xC2\xB4", "\x27"]; // Trema, Crase, Agudo, Apóstrofo
    $simbolosEspeciais2 = ["\xC2\xB0", "\x5E"]; // Grau e Circunferência
    $simbolosEspeciais3 = ["\x7E"]; // Til

    // Iterar sobre cada letra do nome
    for ($i = 0; $i < count($nomeArray); $i++) {
        $letra = $nomeArray[$i];
        $valorLetra = isset($alfabeto[$letra]) ? $alfabeto[$letra] : 0;

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
    }

    // Reduzir a soma a um único dígito ou número mestre
    while ($soma > 9 && $soma != 11 && $soma != 22) {
        $soma = array_sum(str_split($soma));
    }

    return ['numeroExpressao' => $soma];
}

// Exemplo de uso
$nomeCompleto = "Érikã";
$resultado = calcularExpressao($nomeCompleto);
echo "O Número de Expressão para $nomeCompleto é: " . $resultado['numeroExpressao'] . "\n";
