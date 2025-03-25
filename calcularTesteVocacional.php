 public static function calcularTesteVocacional($numeroDestino, $numeroMissao, $numeroExpressao, $dataNascimento, $listaProfissoes)
    {

        $diaNascimento = (int)date('d', strtotime($dataNascimento));

        $numeros = [
            'Destino' => $numeroDestino,
            'Missão' => $numeroMissao,
            'Expressão' => $numeroExpressao,
            'Dia de Nascimento' => $diaNascimento
        ];


        // Armazena todas as profissões encontradas com suas fontes
        $todasProfissoes = [];

        // Mapeia profissões com suas fontes
        foreach ($numeros as $fonte => $numero) {
            if (isset($listaProfissoes[$numero])) {
                //				echo "Profissões para o número $numero ($fonte):\n";
                foreach ($listaProfissoes[$numero] as $profissao) {
                    $todasProfissoes[] = ['profissao' => $profissao, 'fonte' => $fonte];
                }
            }
        }
        // Conta a ocorrência de cada profissão com suas fontes
        $ocorrencias = [];

        //Agrupa as profissões por nome e mantém um registro das fontes
        foreach ($todasProfissoes as $entrada) {
            $profissao = $entrada['profissao'];
            $fonte = $entrada['fonte'];
            if (!isset($ocorrencias[$profissao])) {
                $ocorrencias[$profissao] = ['contagem' => 0, 'fontes' => []];
            }
            $ocorrencias[$profissao]['contagem']++;
            $ocorrencias[$profissao]['fontes'][] = $fonte;
        }

        return $ocorrencias;
    }
