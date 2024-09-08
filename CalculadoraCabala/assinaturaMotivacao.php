<?php
   /* Online PHP Compiler (Interpreter) and Editor */
 

function calcularAssinaturaMotivacao($nomeCompleto)
{
    // Definir valores para as vogais com base na sua solicitação
    $alfabetoVogais = array(
        'A' => 1, 'E' => 5, 'I' => 1, 'O' => 7, 'U' => 6, 'Y' => 1,
        'a' => 1, 'e' => 5, 'i' => 1, 'o' => 7, 'u' => 6, 'y' => 1, 'á' => 3, 
        'Á' => 3,'à' => 3, 'À' => 3,'â' => 8, 'Â' => 8,'ä' => 3, 'Ä' => 3,'å' => 8, 
        'Å' => 8,'ā' => 4, 'Ā' => 4,'é' => 7, 'É' => 7,'è' => 7, 'È' => 7,'ê' => 3, 
        'Ê' => 3,'ë' => 7, 'Ë' => 7,'ẽ' => 8, 'Ẽ' => 8,'í' => 3, 'Í' => 3,'ì' => 3, 
        'Ì' => 3,'î' => 8, 'Î' => 8,'ï' => 3, 'Ï' => 3,'ĩ' => 4, 'Ĩ' => 4,'ó' => 9, 
        'Ó' => 9,'ò' => 9, 'Ò' => 9,'ô' => 5, 'Ô' => 5,'õ' => 1, 'Õ' => 1,'ö' => 9, 
        'Ö' => 9,'ú' => 8, 'Ú' => 8,'ù' => 8, 'Ù' => 8,'û' => 4, 'Û' => 4, 'ü' => 8,
        'Ü' => 8,'ů' => 4, 'Ů' => 4,'ū' => 9, 'Ū' => 9
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
        $valorLetra = isset($alfabetoVogais[$letra]) ? $alfabetoVogais[$letra] : 0;

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

    return ['numeroMotivacao' => $soma, 'sequencia' => $sequencia];
    
}

// Exemplo de uso
$nomeCompleto = "°Erïká";
$resultado = calcularAssinaturaMotivacao($nomeCompleto);
echo "O Número de Expressão para $nomeCompleto é: " . $resultado['numeroMotivacao'] . "\n";
echo "Sequência de Algarismos: " . $resultado['sequencia'];
?>
