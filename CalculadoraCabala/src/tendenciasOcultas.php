<?php
function calcularTendenciaOculta($nome) {
// Tabela de conversão das letras em números
$tabela = [
'a' => 1, 'A' => 1, 'b' => 2, 'B' => 2, 'c' => 3, 'C' => 3, 'd' => 4, 'D' => 4,
'e' => 5, 'E' => 5, 'f' => 8, 'F' => 8, 'g' => 3, 'G' => 3, 'h' => 5, 'H' => 5,
'i' => 1, 'I' => 1, 'j' => 1, 'J' => 1, 'k' => 2, 'K' => 2, 'l' => 3, 'L' => 3,
'm' => 4, 'M' => 4, 'n' => 5, 'N' => 5, 'o' => 7, 'O' => 7, 'p' => 8, 'P' => 8,
'q' => 1, 'Q' => 1, 'r' => 2, 'R' => 2, 's' => 3, 'S' => 3, 't' => 4, 'T' => 4,
'u' => 6, 'U' => 6, 'v' => 6, 'V' => 6, 'w' => 6, 'W' => 6, 'x' => 6, 'X' => 6,
'y' => 1, 'Y' => 1, 'z' => 7, 'Z' => 7, 'ç' => 6, 'Ç' => 6
];

// Remover espaços e caracteres não alfabéticos
$nome = preg_replace('/[^a-zA-Z]/', '', $nome);

// Função para reduzir o número até um dígito entre 1 e 9
function reduzirNumero($numero) {
while ($numero > 9) {
$numero = array_sum(str_split($numero));
}
return $numero;
}

// Contagem de frequências dos números
$frequencias = [];
foreach (str_split($nome) as $letra) {
if (isset($tabela[$letra])) {
$numero = reduzirNumero($tabela[$letra]);
if (isset($frequencias[$numero])) {
$frequencias[$numero]++;
} else {
$frequencias[$numero] = 1;
}
}
}

// Identificar tendências ocultas
$tendenciasOcultas = [];
foreach ($frequencias as $numero => $contagem) {
if ($contagem > 3) {
$tendenciasOcultas[] = $numero;
}
}

// Ordenar as tendências ocultas em ordem numérica
sort($tendenciasOcultas);

// Retornar tendências ocultas
return $tendenciasOcultas;
}

// Exemplo de uso:
$nome = "Joaquim Cardoso";
$tendencias = calcularTendenciaOculta($nome);
if (!empty($tendencias)) {
echo "Tendência(s) Oculta(s): " . implode(", ", $tendencias);
} else {
echo "Nenhuma Tendência Oculta encontrada.";
}
