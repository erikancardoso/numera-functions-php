<?php

function testeVocacional($numeroDestino, $numeroMissao, $numeroExpressao, $diaNascimento) {
    // Lista de profissões mapeadas pelos números
    $listaProfissoes = [
        1 => ["empreendedor", "gestor", "executivo", "diretor", "presidente", "CEO", "gerente", "coordenador", "arquiteto", "advogado", "redator", "chefe de departamento", "publicitário", "inventor", "escritor", "líder comercial", "programador", "militar", "conferencista", "promotor", "inspetor", "analista", "embaixador", "editor", "produtor de filmes", "produtor teatral", "fazendeiro", "piloto", "ilustrador", "político", "geógrafo", "médico", "designer"],
        2 => ["professor", "estudante", "pesquisador", "secretário", "político", "diplomata", "psicólogo", "contador", "estatístico", "poeta", "médico", "músico", "cantor", "dançarino", "consultor", "bibliotecário", "administrador", "mecânico", "legislador", "pastor", "cobrador", "escriturário", "colunista", "agente de turismo", "biógrafo", "compositor", "paisagista", "produtor", "astrônomo", "garçom", "arquiteto", "ministro", "publicitário", "medium", "escultor"],
        3 => ["estilista", "esteticista", "modelo", "pregador", "músico", "ator", "administrador", "jornalista", "artista", "publicitário", "escritor", "decorador", "designer", "paisagista", "aviador", "crítico literário", "executivo", "influencer", "maquiador", "cabeleireiro", "promotor de eventos", "farmacêutico", "cartunista", "eletricista", "professor", "artesão", "filósofo", "promotor", "fotógrafo", "linguista", "químico", "médico", "assistente social", "advogado", "juiz", "sacerdote", "atleta", "humorista", "costureiro", "conferencista"],
        4 => ["corretor de imóveis", "eletricista", "mecânico", "relojoeiro", "caixa", "comerciante", "mineiro", "garçom", "fazendeiro", "pedreiro", "perito", "encanador", "instrutor", "operário", "revisor", "construtor", "arquiteto", "artesão", "arqueólogo", "engenheiro", "contador", "economista", "executivo", "militar", "marceneiro", "policial", "bombeiro", "dentista", "químico", "empreiteiro", "investidor"],
        5 => ["vendedor", "artista", "promotor de eventos", "político", "servidor público", "detetive", "advogado", "repórter", "publicitário", "orador", "ator", "comissário de bordo", "agente de viagens", "policial", "aviador", "relações públicas", "líder civil", "investigador", "jornalista", "viajante", "investidor", "guia turístico", "professor de idiomas", "intérprete", "esportista", "gerente logística", "comprador", "agrimensor", "marinheiro", "inventor", "promotor", "diretor teatral", "colunista", "conferencista", "editor", "psicólogo", "escritor", "fotógrafo", "geógrafo", "político", "consultor"],
        6 => ["diplomata", "ministro", "médico", "psicólogo", "advogado da família", "enfermeiro", "nutricionista", "dentista", "poeta", "músico", "ator", "artista", "escritor", "estilista", "desenhista", "designer de interiores", "consultor", "instrutor", "professor", "terapeuta", "administrador hospitalar", "diretor de escola", "camareiro", "executivo de produtos domésticos", "costureiro", "corretor de imóveis", "jardineiro", "paisagista", "pecuarista", "serviços domésticos", "agricultor", "lojista", "comerciante", "perfumista", "servidor público", "recepcionista", "economista", "floricultor", "tutor", "decorador"],
        7 => ["cientista", "químico", "biológico", "físico", "artesão", "pesquisador", "analista", "político", "sacerdote", "líder religioso", "astrólogo", "numerólogo", "filósofo", "teólogo", "matemático", "advogado", "juiz", "reitor", "professor", "detetive", "cirurgião", "radialista", "escritor", "editor", "cientista de dados", "engenheiro eletrônico", "técnico de Informática", "bibliotecário", "banqueiro", "contador", "psicanalista", "psicólogo", "desenhista", "arquiteto", "auditor", "superintendente", "ocultista", "dentista", "arqueólogo", "historiador", "astrônomo", "engenheiro", "pregador", "musicista"],
        8 => ["consultor", "corretor de imóveis", "banqueiro", "gerente de lojas", "executivo gráfica", "executivo editora", "executivo jornal", "presidente de empresa", "empreendedor", "executivo", "investidor", "comprador", "vendedor", "político", "filantropo", "treinador de esportes", "servidor público", "administrador", "juiz", "promotor", "analista comercial", "supervisor", "farmacêutico", "militar", "contador", "químico", "caixa", "estatístico", "engenheiro", "analista bancário", "investigador", "conselheiro financeiro", "advogado empresarial", "supervisor", "produtor"],
        9 => ["artista", "ator", "escultor", "professor", "músico", "diplomata", "policial", "médico", "líder religioso", "diretor de ongs", "assistente social", "advogado", "juiz", "bombeiro", "político", "filantropo", "cirurgião", "dentista", "nutricionista", "enfermeiro", "psicólogo", "comissário de bordo", "agente de viagens", "humorista", "horticultor", "paisagista", "recepcionista", "cientista", "conferencista", "repórter", "eletricista", "engenheiro", "astrônomo", "ocultista", "desenhista", "conselheiro", "apresentador", "compositor", "publicitário", "mágico", "pesquisador", "promotor", "aviador", "vendedor de arte", "pregador", "ilustrador", "químico"],
        11 => ["líder religioso", "filántropo", "sacerdote", "astrólogo", "numerólogo", "filósofo", "fotógrafo", "escritor", "poeta", "psicanalista", "psicólogo", "ministro", "crítico comentarista", "inventor", "ator", "medium", "aviador", "cientista", "artista", "esotérico", "terapeuta", "jornalista", "apresentador", "publicitário", "radialista", "colecionador", "pregador", "orador", "diplomata", "político", "pesquisador", "místico", "artista"],
        22 => ["vendedor", "artista", "promotor de eventos", "político", "servidor público", "detetive", "advogado", "repórter", "publicitário", "orador", "ator", "comissário de bordo", "agente de viagens", "policial", "aviador", "relações públicas", "líder civil", "investigador", "jornalista", "viajante", "investidor", "guia turístico", "professor de idiomas", "intérprete", "esportista", "gerente logística", "comprador", "agrimensor", "marinheiro", "inventor", "promotor", "diretor teatral", "colunista", "conferencista", "editor", "psicólogo", "escritor", "fotógrafo", "geógrafo", "político", "consultor"],
    ];

    // Números para procurar na lista de profissões e suas fontes
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
            echo "Profissões para o número $numero ($fonte):\n";
            foreach ($listaProfissoes[$numero] as $profissao) {
                echo "- $profissao\n";
                $todasProfissoes[] = ['profissao' => $profissao, 'fonte' => $fonte];
            }
        } else {
            echo "Não há profissões mapeadas para o número $numero ($fonte).\n";
        }
        echo "\n";
    }

    // Conta a ocorrência de cada profissão com suas fontes
    $ocorrencias = [];

    // Agrupa as profissões por nome e mantém um registro das fontes
    foreach ($todasProfissoes as $entrada) {
        $profissao = $entrada['profissao'];
        $fonte = $entrada['fonte'];
        if (!isset($ocorrencias[$profissao])) {
            $ocorrencias[$profissao] = ['contagem' => 0, 'fontes' => []];
        }
        $ocorrencias[$profissao]['contagem']++;
        $ocorrencias[$profissao]['fontes'][] = $fonte;
    }

    // Exibe as profissões que aparecem mais de uma vez e suas origens
    echo "Profissões em comum e suas frequências:\n";
    foreach ($ocorrencias as $profissao => $dados) {
        if ($dados['contagem'] > 1) {
            $fontesUnicas = array_unique($dados['fontes']);
            echo "- $profissao: {$dados['contagem']} vezes, em: " . implode(', ', $fontesUnicas) . "\n";
        }
    }
}

// Exemplo de uso
testeVocacional(5, 7, 9, 3);

?>

