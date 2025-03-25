<?php

function testeVocacional($numeroDestino, $numeroMissao, $numeroExpressao, $diaNascimento) {
    // Lista de profissões mapeadas pelos números
$listaProfissoes = [
    'destino' => [
        1 => ["Advogado", "Ator", "Diretor de Escola", "Empreendedor", "Escritor", "Esotérico", "Executivo", "Fazendeiro", "Inventor", "Marketing Digital", "Político", "Publicitário", "Radialista", "Vendedor"],
        2 => ["Advogado Tributarista", "Arqueólogo", "Assistente Social", "Bibliotecário", "Contador", "Diplomata", "Financista", "Médico Sanitarista", "Pesquisador"],
        3 => ["Apresentador de TV", "Artista", "Designer", "Empresário", "Esportista", "Jornalista", "Marketing Digital", "Modelo", "Professor", "Radialista", "Sociólogo", "Youtuber"],
        4 => ["Arquiteto", "Arquiteto", "Bombeiro", "Contador", "Economista", "Engenheiro", "Escritor", "Historiador", "Matemático", "Mecânico", "Negociante de Antiguidades", "Numerólogo", "Policial"],
        5 => ["Arquiteto", "Designer de Interiores", "Esotérico", "Esportista", "Esteticista", "Humorista", "Orador", "Político", "Radialista", "Repórter", "Servidor Público", "Vendedor", "Viajante"],
        6 => ["Advogado", "Alto Executivo", "Conselheiro", "Diplomata", "Médico", "Missionário", "Professor", "Psicólogo", "Religioso", "Servidor Público", "Vendedor"],
        7 => ["Advogado", "Ciência da Computação", "Escritor", "Farmacêutico", "Físico", "Juiz de Direito", "Marinheiro", "Pesquisador", "Pesquisador", "Químico", "Religioso", "Secretário", "Técnico em Comunicação", "Veterinário"],
        8 => ["Advogado", "Agente Teatral", "Bolsa de Valores (Operador)", "Comerciante", "Empresário", "Financista", "Gerente de Loja", "Político", "Vendedor de Artigos de Luxo"],
        9 => ["Advogado", "Arqueólogo", "Artista Plástico", "Escritor", "Esotérico", "Médico", "Missionário", "Pesquisador", "Professor", "Psicólogo", "Religioso"],
        11 => ["Assistente Social", "Consultor","Diplomata","Embaixador", "Engenheiro", "Escritor", "Esotérico", "Filósofo", "Médico", "Político", "Psicanalista"],
        22 =>["Bruxo", "Diplomata", "Empresário", "Esotérico", "Juiz", "Médico", "Professor", "Radialista", "Relações Públicas", "Religioso", "Vendedor"],
    ],
    'missao' => [
        1 => ["Administrador de Empresas", "Artista", "Empresário", "Esotérico", "Especulador Financista", "Político"],
        2 => ["Advogado", "Assistente Social", "Caixa de Banco", "Diplomata", "Escriturário", "Juiz", "Médico", "Professor"],
        3 => ["Artista", "Designer", "Escritor", "Fotógrafo", "Jornalista", "Músico", "Paisagista", "Radialista"],
        4 => ["Dentista", "Engenheiro Civil", "Financista", "Metalúrgico", "Policial", "Político", "Químico"],
        5 => ["Cientista", "Esportista", "Filósofo", "Político", "Professor", "Religioso", "Trabalhos Humanitários"],
        6 => ["Assistente Social", "Enfermeiro", "Esotérico", "Médico", "Metalúrgico", "Professor", "Radialista", "Religioso"],
        7 => ["Diretor de Escola", "Escritor Metafísico", "Explorador", "Historiador", "Pesquisador", "Pregador Religioso", "Professor", "Psicólogo"],
        8 => ["Advogado", "Banqueiro", "Comerciante", "Empresário", "Executivo", "Político"],
        9 => ["Escritor de Livros", "Historiador", "Humanitário", "Orador", "Pesquisador", "Religioso"],
        11 => ["Aviador", "Diplomata", "Esotérico", "Juiz de Direito", "Juiz de Paz", "Médico", "Político"],
        22 => ["Aviador", "Contador", "Esotérico", "Filantropo", "Filósofo", "Financista", "Médico", "Pesquisador", "Político", "Relações Públicas", "Religioso"],
    ],
    'expressao' => [
        1 => ["Alto Executivo", "Arquiteto", "Artista", "Diretor de Empresas", "Embaixador", "Empresário", "Físico Nuclear", "Inventor", "Marketing Digital", "Político", "Turista", "Youtuber"],
        2 => ["Advogado", "Agrimensor", "Bibliotecário", "Conselheiro", "Contador", "Economista", "Eletricista", "Historiador", "Iluminador", "Maquiador", "Mecânico", "Militar", "Tributarista"],
        3 => ["Apresentador", "Ator", "Cantor", "Designer de Interiores", "Empresário de Moda e Beleza", "Escritor", "Humorista", "Marketing Digital", "Pintor", "Radialista", "Vendedor", "Youtuber"],
	    4 => ["Arqueólogo", "Astrólogo", "Contador", "Corretor de Imóveis", "Economista", "Engenheiro", "Físico", "Matemático", "Médico", "Metalúrgico", "Militar"],
	    5 => ["Empresário", "Esotérico", "Historiador", "Marketing Digital", "Músico", "Político", "Radialista", "Turista", "Vendedor"],
	    6 => ["Empresário ramo Alimentação", "Garçom", "Médico", "Músico", "Nutricionista", "Paisagista", "Pesquisador", "Pintor", "Relações Públicas", "Restaurador", "Sociólogo", "Veterinário"],
	    7 => ["Ator", "Construção Civil", "Filósofo", "Físico", "Pesquisador", "Político", "Professor", "Religioso"],
	    8 => ["Advogado", "Bolsa de Valores (Operador)", "Comerciante", "Empresário", "Executivo", "Financista", "Juiz"],
	    9 => ["Assistente Social", "Bombeiro", "Editor de Livros", "Músico", "Oceanógrafo", "Religioso", "Técnico em Comunicação"],
	    11 => ["Administrador de Empresas", "Bruxo", "Diretor de Marketing", "Esotérico", "Militar de Alta Patente", "Político", "Psicólogo", "Psiquiatra", "Sociólogo"],
	    22 => ["Advogado", "Aeronauta", "Agente Imobiliário", "Banqueiro", "Bruxo", "Cineasta", "Designer de Interiores", "Diplomata", "Fotógrafo", "Gerente de Banco", "Industrial", "Juiz", "Político", "Professor", "Teatrólogo"],
    ],
    'dataNascimento' => [
    	1 => ["Arquiteto", "Artista", "Comerciante", "Designer", "Empresário", "Executivo", "Líder Religioso", "Piloto de Automóvel"],
    2 => ["Advogado", "Atividades Artísticas", "Diplomata", "Escritor", "Professor", "Publicidade", "Relações Públicas", "Sociólogo"],
    3 => ["Administrador de Empresas", "Artista", "Aviador", "Compositor", "Esportista", "Estilista", "Fotógrafo", "Jornalista", "Operador de Telemarketing", "Radialista", "Vendedor"],
    4 => ["Arquitetura", "Construção Civil", "Contador", "Dentista", "Eletricidade", "Indústrias Metalúrgicas/Mecânicas e Químicas", "Segurança", "Técnico em Geral", "Transporte"],
    5 => ["Agente de Viagens", "Artista", "Desenhista", "Esotérico", "Farmacêutico", "Hoteleiro", "Jogador de Futebol", "Jogador de qualquer Esporte de Massa", "Jornalista", "Marinheiro", "Policial", "Publicitário", "Relações Públicas", "Repórter"],
    6 => ["Ator", "Camareiro", "Compositor", "Corretor de Imóveis", "Cozinheiro", "Decorador", "Enfermeiro", "Esotérico", "Floricultor", "Fotógrafo", "Investigador", "Matemático", "Músico", "Nutricionista", "Pecuarista", "Redator", "Religioso", "Servidor Público", "Sociólogo", "Veterinário"],
    7 => ["Advogado", "Analista de Sistemas", "Biólogo", "Cientista", "Cineasta", "Comprador", "Diretor Social", "Editor de Revistas e Jornais", "Escultor", "Filósofo", "Físico", "Juiz de Direito", "Líder Religioso", "Oceanógrafo", "Psicanalista", "Químico", "Secretário"],
    8 => ["Advogado", "Agente Teatral", "Bolsa de Valores (Operador)", "Comerciante de Artigos de Luxo", "Economista", "Executivo", "Financista", "Presidente de Empresas", "Projetista Industrial"],
    9 => ["Advogado", "Bombeiro", "Cientista", "Escultor", "Esotérico", "Filantropo", "Jurista", "Marinheiro", "Metalúrgico", "Professor", "Religioso", "Técnico em Comunicação"],
    10 => ["Arquiteto", "Chefe", "Comerciante", "Consultor", "Diplomata", "Diretor", "Empreiteiro de Obras", "Engenheiro", "Esportista", "Jornalista", "Metalúrgico", "Radialista", "Vendedor"],
    11 => ["Assistente Social", "Consultor", "Diplomata", "Engenheiro", "Escritor", "Esotérico", "Filósofo", "Historiador", "Investigador", "Juiz de Direito", "Médico", "Negociante de Antiguidades", "Político", "Professor", "Psicólogo", "Repórter"],
    12 => ["Administrador de Empresas", "Ator", "Aviador", "Compositor", "Designer", "Escultor", "Esportista", "Estilista", "Músico", "Numerólogo", "Político", "Radialista", "Vendedor"],
    13 => ["Administrador de Empresas", "Arqueólogo", "Ator", "Ator (trabalhar em circo)", "Contador", "Dentista", "Engenheiro Civil", "Engenheiro Eletrônico", "Médico", "Médico Cirurgião", "Militar", "Político", "Químico", "Sociólogo"],
    14 => ["Cantor", "Escritor", "Farmacêutico", "Financista", "Investigador de Polícia", "Jornalista", "Músico", "Negociante", "Político", "Psicoterapeuta", "Psiquiatra", "Relações Públicas", "Repórter", "Sociólogo"],
    15 => ["Administrador Hospitalar", "Ator", "Beleza", "Decorador", "Esotérico", "Estilista", "Floricultor", "Líder Comunitário", "Moda", "Religioso"],
    16 => ["Advogado", "Analista de Sistemas", "Cientista", "Comunicação", "Escritor", "Historiador", "Jornalista", "Matemático", "Pesquisador", "Político", "Professor", "Psicólogo", "Radialista", "Veterinário"],
    17 => ["Advogado Tributarista", "Comerciante", "Comércio Exterior", "Conselheiro", "Consultor de Grandes Empresas", "Contador", "Corretor de Imóveis", "Diplomata", "Economista", "Executivo", "Gerente de Loja", "Político", "Relações Públicas", "Religioso"],
    18 => ["Ambientalista", "Artista", "Cientista", "Esotérico", "Físico Quântico", "Massagista", "Médico Naturalista", "Músico", "Padre", "Pastor", "Psiquiatra", "Religioso", "Veterinário"],
    19 => ["Arqueólogo", "Arquivista", "Bibliotecário", "Comprador", "Diplomata", "Embaixador", "Enfermeiro", "Esotérico", "Financista", "Historiador", "Médico", "Músico", "Psicólogo"],
    20 => ["Cozinheiro", "Decorador", "Enfermeiro", "Estatístico", "Médico", "Músico", "Poeta", "Político", "Professor", "Psicólogo", "Relações Públicas", "Secretário", "Vendedor de Artigos de Luxo", "Veterinário"],
      21 => ["Administrador de Empresas", "Atleta", "Ator Teatral", "Crítico de Arte", "Crítico Literário", "Estilista de Moda", "Fotógrafo", "Jornalista", "Moda", "Radialista", "Telefonista"],
    22 => ["Artista", "Assistente Social", "Aviador", "Cientista", "Comerciante de Artigos de Luxo", "Conferencista", "Embaixador", "Escritor", "Escultor", "Executivo", "Filantropo", "Filósofo", "Inventor", "Líder Religioso", "Político"],
    23 => ["Artista", "Aviador", "Desenhista", "Diplomata", "Escritor", "Escritor Metafísico", "Farmacêutico", "Jornalista", "Mecânico", "Médico", "Político", "Psicólogo", "Psiquiatra", "Radialista", "Relações Públicas", "Repórter", "Terapeuta Holístico", "Vendedor"],
    24 => ["Administrador Hospitalar", "Cozinheiro", "Decorador", "Esotérico", "Floricultor", "Fotógrafo", "Marceneiro", "Mecânico", "Médico", "Mordomo", "Nutricionista", "Professor", "Psicólogo", "Técnico Eletrônico", "Veterinário"],
    25 => ["Advogado", "Astrólogo", "Biólogo", "Cientista", "Cineasta", "Comunicador", "Corretor de Imóveis", "Esotérico", "Filósofo", "Financista", "Marinha", "Oceanógrafo", "Político", "Professor", "Sociólogo"],
    26 => ["Advogado", "Ator Teatral", "Ator", "Comerciante", "Comprador", "Construtor", "Engenheiro Civil", "Esotérico", "Executivo", "Gerente de Loja", "Juiz", "Político", "Professor"],
    27 => ["Advogado", "Aviador", "Biólogo", "Cientista", "Comunicador", "Empreendedor", "Esportista", "Filantropo", "Investidor", "Oficial do Exército", "Polícia Militar", "Policial", "Presidente de Empresa", "Turista", "Vendedor"],
    28 => ["Arquiteto", "Assistente Social", "Consultor", "Diplomata", "Eletricista", "Esportista", "Executivo", "Líder Religioso", "Policial", "Técnico em Comunicação", "Técnico-Eletrônica"],
    29 => ["Advogado", "Comerciante", "Escritor", "Esotérico", "Jornalista", "Juiz de Direito", "Professor", "Publicitário", "Radialista", "Relações Públicas", "Religioso", "Repórter", "Treinador"],
    30 => ["Apresentador", "Ator", "Empresário", "Engenheiro", "Esteticista", "Filantropo", "Jornalista", "Maquiador", "Operador de Telemarketing", "Sociólogo", "Vendedor", "Viajante"],
    31 => ["Arquiteto", "Aviador", "Economista", "Empreiteiro de Obras", "Escultor", "Mecânico", "Militar", "Numerólogo", "Paisagista", "Pintor", "Relações Públicas", "Secretário", "Técnico em Eletrônica"],
    ],
];

print_r($profissoes); // Exemplo de saída para ver o array

?>


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
testeVocacional(11, 22, 11, 19);

?>
