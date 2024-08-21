<?php

function reduzirTeosoficamente($numero)
{
    while ($numero > 9 && $numero != 11 && $numero != 22) {
        $numero = array_sum(str_split($numero));
    }
    return $numero;
}

function momentosDecisivos($dataNascimento, $dataFimPrimeiroCiclo)
{
    // Dividir a data de nascimento em dia, mês e ano
    list($diaNascimento, $mesNascimento, $anoNascimento) = explode("/", $dataNascimento);

    // fazer as reduções separadas dia, mes e ano
    $diaReduzido = reduzirTeosoficamente($diaNascimento);
    $mesReduzido = reduzirTeosoficamente($mesNascimento);
    $anoReduzido = reduzirTeosoficamente($anoNascimento);

    // Calcular o primeiro momento (soma do dia e mês de nascimento)
    $primeiroMomento = $diaReduzido + $mesReduzido;
    $primeiroMomentoReduzido = reduzirTeosoficamente($primeiroMomento);


    // Definir o momento inicial e final do primeiro ciclo
    $momentoInicial1 = $anoNascimento;
    $momentoFinal1 = $dataFimPrimeiroCiclo;

    // Calcular o segundo momento (soma do dia e ano de nascimento)
    $segundoMomento = $diaReduzido + $anoReduzido;
    $segundoMomentoReduzido = reduzirTeosoficamente($segundoMomento);

    // Definir o momento inicial e final do segundo ciclo
    $momentoInicial2 = $momentoFinal1;
    $momentoFinal2 = $momentoInicial2 + 9;

    // Calcular o terceiro momento (soma do primeiro momento e segundo momento)
    $terceiroMomento = $primeiroMomentoReduzido + $segundoMomentoReduzido;
    $terceiroMomentoReduzido = reduzirTeosoficamente($terceiroMomento);

    // Definir o momento inicial e final do terceiro ciclo
    $momentoInicial3 = $momentoFinal2;
    $momentoFinal3 = $momentoInicial3 + 9;

    // Calcular o quarto momento (soma do mês e ano de nascimento)
    $quartoMomento = $mesReduzido + $anoReduzido;
    $quartoMomentoReduzido = reduzirTeosoficamente($quartoMomento);

    // Definir o momento inicial e final do quarto ciclo
    $momentoInicial4 = $momentoFinal3;
    $momentoFinal4 = "até o fim da vida";

    return [
        "primeiroMomento" => $primeiroMomentoReduzido,
        "momentoInicial1" => $momentoInicial1,
        "momentoFinal1" => $momentoFinal1,

        "segundoMomento" => $segundoMomentoReduzido,
        "momentoInicial2" => $momentoInicial2,
        "momentoFinal2" => $momentoFinal2,

        "terceiroMomento" => $terceiroMomentoReduzido,
        "momentoInicial3" => $momentoInicial3,
        "momentoFinal3" => $momentoFinal3,

        "quartoMomento" => $quartoMomentoReduzido,
        "momentoInicial4" => $momentoInicial4,
        "momentoFinal4" => $momentoFinal4
    ];
}

// Exemplo de uso
$dataNascimento = "01/05/1979";
// O primeiro ciclo de vida é o ano em que ele termina
$dataFimPrimeiroCiclo = 2011;

$resultado = momentosDecisivos($dataNascimento, $dataFimPrimeiroCiclo);

echo "Primeiro Momento: " . $resultado["primeiroMomento"] . "\n";
echo "Momento Inicial 1: " . $resultado["momentoInicial1"] . "\n";
echo "Momento Final 1: " . $resultado["momentoFinal1"] . "\n\n";

echo "Segundo Momento: " . $resultado["segundoMomento"] . "\n";
echo "Momento Inicial 2: " . $resultado["momentoInicial2"] . "\n";
echo "Momento Final 2: " . $resultado["momentoFinal2"] . "\n\n";

echo "Terceiro Momento: " . $resultado["terceiroMomento"] . "\n";
echo "Momento Inicial 3: " . $resultado["momentoInicial3"] . "\n";
echo "Momento Final 3: " . $resultado["momentoFinal3"] . "\n\n";

echo "Quarto Momento: " . $resultado["quartoMomento"] . "\n";
echo "Momento Inicial 4: " . $resultado["momentoInicial4"] . "\n";
echo "Momento Final 4: " . $resultado["momentoFinal4"] . "\n";

