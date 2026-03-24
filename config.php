<?php
// Arquivo: config.php

define('DEFAULT_BASE_URL', 'https://metrocal.com.br/');

if (!function_exists('metrocal_normalize_base_url')) {
    function metrocal_normalize_base_url($url)
    {
        return rtrim((string) $url, "/ \t\n\r\0\x0B") . '/';
    }

    function metrocal_detect_scheme()
    {
        if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            $forwardedProto = explode(',', (string) $_SERVER['HTTP_X_FORWARDED_PROTO']);
            return strtolower(trim($forwardedProto[0])) === 'https' ? 'https' : 'http';
        }

        if (!empty($_SERVER['HTTPS']) && strtolower((string) $_SERVER['HTTPS']) !== 'off') {
            return 'https';
        }

        if (!empty($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443) {
            return 'https';
        }

        return 'http';
    }

    function metrocal_detect_base_path()
    {
        $scriptName = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? '/index.php'));
        $scriptDir = str_replace('\\', '/', dirname($scriptName));

        if ($scriptDir === '.' || $scriptDir === '/' || $scriptDir === '\\') {
            $scriptDir = '';
        }

        $projectRoot = str_replace('\\', '/', __DIR__);
        $scriptFileDir = str_replace('\\', '/', (string) dirname((string) ($_SERVER['SCRIPT_FILENAME'] ?? '')));
        $relativeDir = '';

        if ($scriptFileDir !== '' && strpos($scriptFileDir, $projectRoot) === 0) {
            $relativeDir = trim(substr($scriptFileDir, strlen($projectRoot)), '/');
        }

        if ($relativeDir !== '') {
            foreach (explode('/', $relativeDir) as $segment) {
                if ($segment === '') {
                    continue;
                }

                $scriptDir = dirname($scriptDir === '' ? '/' : $scriptDir);

                if ($scriptDir === '.' || $scriptDir === '/' || $scriptDir === '\\') {
                    $scriptDir = '';
                }
            }
        }

        return $scriptDir;
    }

    function metrocal_detect_base_url()
    {
        $configuredBaseUrl = getenv('METROCAL_BASE_URL');

        if (!empty($configuredBaseUrl)) {
            return metrocal_normalize_base_url($configuredBaseUrl);
        }

        if (empty($_SERVER['HTTP_HOST'])) {
            return DEFAULT_BASE_URL;
        }

        $scheme = metrocal_detect_scheme();
        $host = (string) $_SERVER['HTTP_HOST'];
        $basePath = metrocal_detect_base_path();

        return metrocal_normalize_base_url($scheme . '://' . $host . $basePath);
    }

    function metrocal_current_page_key()
    {
        $projectRoot = str_replace('\\', '/', __DIR__);
        $scriptFile = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_FILENAME'] ?? ''));

        if ($scriptFile !== '' && strpos($scriptFile, $projectRoot) === 0) {
            return ltrim(substr($scriptFile, strlen($projectRoot)), '/');
        }

        return 'index.php';
    }

    function metrocal_humanize_title($value)
    {
        $title = preg_replace('/\.php$/i', '', (string) $value);
        $title = str_replace(array('-', '_'), ' ', $title);
        $title = preg_replace('/\s+/', ' ', trim((string) $title));

        if (function_exists('mb_convert_case')) {
            $title = mb_convert_case($title, MB_CASE_TITLE, 'UTF-8');
        } else {
            $title = ucwords($title);
        }

        $replacements = array(
            'Calibracao' => 'Calibração',
            'Assistencia Tecnica' => 'Assistência Técnica',
            'Qualificacao' => 'Qualificação',
            'Afericao' => 'Aferição',
            'Autoclaves' => 'Autoclaves',
            'Autoclave' => 'Autoclave',
            'Camara Climatica' => 'Câmara Climática',
            'Capela Fluxo Laminar' => 'Capela de Fluxo Laminar',
            'Condutivimetro' => 'Condutivímetro',
            'Centrifuga' => 'Centrífuga',
            'Densimetro' => 'Densímetro',
            'Espectrofotometro' => 'Espectrofotômetro',
            'Estufas' => 'Estufas',
            'Estufa' => 'Estufa',
            'Fotometro' => 'Fotômetro',
            'Instrumentos De Medicao' => 'Instrumentos de Medição',
            'Laboratorio' => 'Laboratório',
            'Manutencao' => 'Manutenção',
            'Medidor De Ph' => 'Medidor de pH',
            'Medicao' => 'Medição',
            'Micronal' => 'Micronal',
            'Phmetro' => 'pHmetro',
            'Servico' => 'Serviço',
            'Tecnicos' => 'Técnicos',
            'Termica' => 'Térmica',
            'Turbidimetro' => 'Turbidímetro',
            'Uv Vis' => 'UV-VIS',
        );

        $title = strtr($title, $replacements);
        $title = preg_replace('/\bDe\b/u', 'de', $title);
        $title = preg_replace('/\bDa\b/u', 'da', $title);
        $title = preg_replace('/\bDo\b/u', 'do', $title);
        $title = preg_replace('/\bE\b/u', 'e', $title);
        $title = preg_replace('/\bEm\b/u', 'em', $title);

        return $title;
    }

    function metrocal_slugify($value)
    {
        $value = strtr((string) $value, array(
            'Á' => 'A', 'À' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
            'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
            'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
            'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
            'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
            'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
            'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
            'Ç' => 'C', 'ç' => 'c', 'Ñ' => 'N', 'ñ' => 'n',
        ));

        $value = strtolower($value);
        $value = preg_replace('/[^a-z0-9]+/', '-', $value);

        return trim((string) $value, '-');
    }

    function metrocal_service_item($label, $path)
    {
        return array(
            'label' => $label,
            'url' => BASE_URL . ltrim((string) $path, '/'),
        );
    }

    function metrocal_get_service_categories()
    {
        return array(
            array(
                'title' => 'Calibração',
                'items' => array(
                    metrocal_service_item('Calibração de autoclaves', 'pages/Calibracao/Calibracao-de-autoclave.php'),
                    metrocal_service_item('Calibração de estufas', 'pages/Calibracao/Calibracao-de-estufa.php'),
                    metrocal_service_item('Calibração de equipamentos laboratoriais', 'pages/Calibracao/Calibracao-de-equipamentos-de-laboratorio.php'),
                    metrocal_service_item('Calibração de equipamentos elétricos', 'pages/Calibracao/Calibracao-de-equipamentos-eletricos.php'),
                    metrocal_service_item('Calibração de equipamentos de tempo e frequência', 'pages/Calibracao/Calibracao-de-equipamentos-de-tempo-e-frequencia.php'),
                    metrocal_service_item('Calibração de equipamentos de temperatura e umidade', 'pages/Calibracao/Calibracao-de-equipamentos-de-temperatura-e-umidade.php'),
                    metrocal_service_item('Calibração de instrumentos de medição dimensionais', 'pages/Calibracao/Calibracao-de-instrumentos-de-medicao-dimensionais.php'),
                    metrocal_service_item('Calibração de massas', 'pages/Calibracao/Calibracao-de-massas.php'),
                    metrocal_service_item('Calibração de pressão', 'pages/Calibracao/Calibracao-de-pressao.php'),
                    metrocal_service_item('Calibração de balanças', 'pages/Calibracao/Calibracao-de-balancas.php'),
                    metrocal_service_item('Calibração de acústica e medição de ruído', 'pages/Calibracao/Calibracao-de-acustica-e-medicao-de-ruido.php'),
                    metrocal_service_item('Calibração de equipamentos hospitalares', 'pages/Calibracao/Calibracao-de-equipamentos-hospitalares.php'),
                ),
            ),
            array(
                'title' => 'Assistência técnica',
                'items' => array(
                    metrocal_service_item('Manutenção corretiva e preventiva em equipamentos médicos', 'pages/Assistencia-Tecnica/manutencao-corretiva-e-preventiva-em-equipamentos-medicos.php'),
                    metrocal_service_item('Manutenção corretiva e preventiva em estufas, autoclaves e afins', 'pages/Assistencia-Tecnica/manutencao-corretiva-e-preventiva-em-estufas-autoclaves-e-afins.php'),
                    metrocal_service_item('Manutenção corretiva e preventiva em equipamentos laboratoriais', 'pages/Assistencia-Tecnica/assistencia-tecnica-equipamentos-laboratorio.php'),
                    metrocal_service_item('Manutenção corretiva e preventiva em equipamentos oftalmológicos', 'pages/Assistencia-Tecnica/manutencao-corretiva-e-preventiva-em-equipamentos-oftalmologicos.php'),
                ),
            ),
            array(
                'title' => 'Qualificação',
                'items' => array(
                    metrocal_service_item('Qualificação de autoclave, estufas e câmaras climáticas', 'pages/Qualificacao/qualificacao-de-autoclave-estufas-e-camaras-climaticas.php'),
                    metrocal_service_item('Qualificação térmica em geral', 'pages/Qualificacao/qualificacao-termica.php'),
                    metrocal_service_item('Qualificação em capelas de fluxo laminar', 'pages/Qualificacao/qualificacao-capela-fluxo-laminar.php'),
                ),
            ),
            array(
                'title' => 'Outros serviços',
                'items' => array(
                    metrocal_service_item('Treinamentos técnicos', 'pages/Outros/treinamentos-tecnicos.php'),
                    metrocal_service_item('Instalação de equipamentos', 'pages/Outros/instalacao-de-equipamentos.php'),
                    metrocal_service_item('Consultoria em metrologia', 'pages/Outros/consultoria-em-metrologia.php'),
                    metrocal_service_item('Consultoria e treinamento em equipamentos oftalmológicos', 'pages/Outros/consultoria-e-treinamento-em-equipamentos-oftalmologicos.php'),
                ),
            ),
        );
    }

    function metrocal_get_service_options_by_category()
    {
        $options = array();

        foreach (metrocal_get_service_categories() as $category) {
            $options[$category['title']] = array_map(function ($item) {
                return $item['label'];
            }, $category['items']);
        }

        return $options;
    }

    function metrocal_get_scope_categories()
    {
        return array(
            array(
                'title' => 'Dimensional',
                'items' => array(
                    'Durômetro',
                    'Relógio comparador digital e analógico',
                    'Paquímetro',
                    'Micrômetro',
                    'Profundímetro',
                    'Blocos padrões',
                    'Trenas e réguas',
                    'Esquadros e níveis',
                    'Medidores de ângulos',
                    'Medidores de distância',
                    'Estação total (Teodolito)',
                    'Projetor de perfil',
                ),
            ),
            array(
                'title' => 'Eletricidade, Tempo e Frequência',
                'items' => array(
                    'Alicate amperímetro',
                    'Alicate terrômetro',
                    'Multímetro',
                    'Analisador de energia',
                    'Voltímetro e amperímetro',
                    'Megômetro',
                    'Hipot',
                    'Terrômetro',
                    'Caixa de resistência',
                    'Milliohmímetro',
                    'Microhmímetro',
                    'Medidor de relação transformação',
                    'Capacímetro',
                    'Cronômetro',
                    'Tacômetro',
                    'Gerador de frequência',
                ),
            ),
            array(
                'title' => 'Pressão',
                'items' => array(
                    'Manômetros analógicos e digitais',
                    'Válvulas de segurança',
                    'Vacuômetros',
                    'Pressostatos',
                    'Sensores e controladores de pressão',
                ),
            ),
            array(
                'title' => 'Temperatura e Umidade',
                'items' => array(
                    'Câmaras frias e climáticas',
                    'Banho maria termostático',
                    'Freezer e refrigeradores',
                    'Termômetros em geral',
                    'Câmeras termográficas',
                    'Controladores de temperatura',
                    'Termohigrômetros',
                    'Medidor de stress térmico',
                    'Data loggers de temperatura e umidade',
                ),
            ),
            array(
                'title' => 'Volume, Velocidade do Ar, Fluxo e Detecção de Gases',
                'items' => array(
                    'Proveta',
                    'Pipetas e dispensers',
                    'Becker',
                    'Anemômetro',
                    'Bomba de amostragem',
                    'Calibrador de bomba de amostragem',
                    'Detector de gases',
                    'Regulador de fluxo',
                ),
            ),
            array(
                'title' => 'Força, Dureza, Massa e Ótica',
                'items' => array(
                    'Torquímetro',
                    'Dinamômetro',
                    'Esclerômetro',
                    'Balança',
                    'Teodolito',
                    'Níveis a laser',
                    'Célula de carga',
                    'Prensa hidráulica',
                ),
            ),
            array(
                'title' => 'Acústica, Ruído, Frequência e Luminosidade',
                'items' => array(
                    'Decibelímetro',
                    'Dosímetro de ruído',
                    'Dosímetro de vibração',
                    'Calibração de dosímetro',
                    'Audiômetro',
                    'Cabine de audiometria',
                    'Frequencímetro',
                    'Luxímetro',
                ),
            ),
            array(
                'title' => 'Equipamentos Médicos',
                'items' => array(
                    'Desfibrilador',
                    'Eletroencefalograma (EEG)',
                    'Eletrocardiograma (ECG)',
                    'Espirômetro',
                    'Homogeneizador de tubos e bolsas',
                    'Holter e mapa',
                    'Centrífugas',
                    'Incubadoras',
                ),
            ),
        );
    }

    function metrocal_get_page_meta()
    {
        $pageKey = metrocal_current_page_key();

        $metaMap = array(
            'index.php' => array(
                'title' => 'Metrocal | Calibração, Qualificação e Assistência Técnica',
                'description' => 'Soluções em calibração, qualificação, aferição e assistência técnica para laboratórios com agilidade, rastreabilidade e suporte especializado.',
            ),
            'pages/sobre.php' => array(
                'title' => 'Sobre a Metrocal | Especialistas em Metrologia',
                'description' => 'Conheça a Metrocal, empresa do Grupo Totallab especializada em calibração, qualificação e serviços metrológicos para laboratórios e indústrias.',
            ),
            'pages/servicos.php' => array(
                'title' => 'Serviços de Calibração e Assistência Técnica | Metrocal',
                'description' => 'Veja os serviços da Metrocal em calibração, qualificação, assistência técnica, aferição e consultoria para instrumentos e equipamentos de laboratório.',
            ),
            'pages/escopos.php' => array(
                'title' => 'Escopos de Calibração | Metrocal',
                'description' => 'Consulte os escopos de calibração da Metrocal por categoria de instrumentos e encontre rapidamente o atendimento ideal para a sua necessidade.',
            ),
            'pages/orcamento.php' => array(
                'title' => 'Solicite Seu Orçamento | Metrocal',
                'description' => 'Solicite um orçamento com a Metrocal para calibração, qualificação, assistência técnica e outros serviços metrológicos.',
            ),
        );

        if (isset($metaMap[$pageKey])) {
            return $metaMap[$pageKey];
        }

        $titleMap = array(
            'pages/Assistencia-Tecnica/assistencia-tecnica-autoclave.php' => 'Assistência Técnica em Autoclave',
            'pages/Assistencia-Tecnica/assistencia-tecnica-equipamentos-laboratorio.php' => 'Assistência Técnica em Equipamentos de Laboratório',
            'pages/Assistencia-Tecnica/assistencia-tecnica-espectrofotometro.php' => 'Assistência Técnica em Espectrofotômetro',
            'pages/Assistencia-Tecnica/assistencia-tecnica-estufa.php' => 'Assistência Técnica em Estufa',
            'pages/Assistencia-Tecnica/assistencia-tecnica-micronal.php' => 'Assistência Técnica Micronal',
            'pages/Assistencia-Tecnica/manutencao-fotometro-chama.php' => 'Manutenção de Fotômetro de Chama',
            'pages/Assistencia-Tecnica/manutencao-phmetro.php' => 'Manutenção de pHmetro',
            'pages/Assistencia-Tecnica/manutencao-preventiva-e-calibracao.php' => 'Manutenção Preventiva e Calibração',
            'pages/Assistencia-Tecnica/manutencao-preventiva.php' => 'Manutenção Preventiva',
            'pages/Calibracao/Calibracao-de-autoclave.php' => 'Calibração de Autoclave',
            'pages/Calibracao/Calibracao-de-centrifuga.php' => 'Calibração de Centrífuga',
            'pages/Calibracao/Calibracao-de-condutivimetro.php' => 'Calibração de Condutivímetro',
            'pages/Calibracao/Calibracao-de-densimetro-digital.php' => 'Calibração de Densímetro Digital',
            'pages/Calibracao/Calibracao-de-densimetro.php' => 'Calibração de Densímetro',
            'pages/Calibracao/Calibracao-de-equipamentos-de-laboratorio.php' => 'Calibração de Equipamentos de Laboratório',
            'pages/Calibracao/Calibracao-de-equipamentos-de-medicao.php' => 'Calibração de Equipamentos de Medição',
            'pages/Calibracao/Calibracao-de-espectrofotometro-uv-vis.php' => 'Calibração de Espectrofotômetro UV-VIS',
            'pages/Calibracao/Calibracao-de-espectrofotometro.php' => 'Calibração de Espectrofotômetro',
            'pages/Calibracao/Calibracao-de-estufa.php' => 'Calibração de Estufa',
            'pages/Calibracao/Calibracao-de-instrumentos-de-medicao.php' => 'Calibração de Instrumentos de Medição',
            'pages/Calibracao/Calibracao-de-instrumentos.php' => 'Calibração de Instrumentos',
            'pages/Calibracao/Calibracao-de-medidor-de-ph.php' => 'Calibração de Medidor de pH',
            'pages/Calibracao/Calibracao-de-pHmetro.php' => 'Calibração de pHmetro',
            'pages/Calibracao/Calibracao-de-turbidimetro.php' => 'Calibração de Turbidímetro',
            'pages/Calibracao/Calibracao-e-manutencao-de-instrumentos-de-medicao.php' => 'Calibração e Manutenção de Instrumentos de Medição',
            'pages/Outros/afericao-de-equipamentos-de-medicao.php' => 'Aferição de Equipamentos de Medição',
            'pages/Outros/afericao-de-equipamentos.php' => 'Aferição de Equipamentos',
            'pages/Outros/afericao-de-instrumentos-de-medicao.php' => 'Aferição de Instrumentos de Medição',
            'pages/Outros/afericao-de-instrumentos.php' => 'Aferição de Instrumentos',
            'pages/Outros/calibracao-camara-climatica.php' => 'Calibração de Câmara Climática',
            'pages/Outros/calibracao-micronal.php' => 'Calibração de Equipamentos Micronal',
            'pages/Outros/consultoria-em-metrologia.php' => 'Consultoria em Metrologia',
            'pages/Outros/servico-de-calibracao-de-instrumentos.php' => 'Serviço de Calibração de Instrumentos',
            'pages/Outros/treinamentos-tecnicos.php' => 'Treinamentos Técnicos',
            'pages/Qualificacao/qualificacao-autoclaves.php' => 'Qualificação de Autoclaves',
            'pages/Qualificacao/qualificacao-binder.php' => 'Qualificação de Equipamentos Binder',
            'pages/Qualificacao/qualificacao-camara-climatica.php' => 'Qualificação de Câmara Climática',
            'pages/Qualificacao/qualificacao-capela-fluxo-laminar.php' => 'Qualificação de Capela de Fluxo Laminar',
            'pages/Qualificacao/qualificacao-de-estufas.php' => 'Qualificação de Estufas',
            'pages/Qualificacao/qualificacao-espectrofotometro.php' => 'Qualificação de Espectrofotômetro',
            'pages/Qualificacao/qualificacao-termica-autoclave.php' => 'Qualificação Térmica de Autoclave',
            'pages/Qualificacao/qualificacao-termica.php' => 'Qualificação Térmica',
        );

        $pageTitle = isset($titleMap[$pageKey]) ? $titleMap[$pageKey] : metrocal_humanize_title(basename($pageKey));
        $pageFolder = str_replace('\\', '/', dirname($pageKey));

        if (strpos($pageFolder, 'pages/Calibracao') === 0) {
            $description = 'Conheça o serviço de ' . $pageTitle . ' da Metrocal, com rastreabilidade, agilidade e suporte técnico especializado.';
        } elseif (strpos($pageFolder, 'pages/Assistencia-Tecnica') === 0) {
            $description = 'Veja como a Metrocal atua em ' . $pageTitle . ' com diagnóstico técnico, manutenção especializada e agilidade no atendimento.';
        } elseif (strpos($pageFolder, 'pages/Qualificacao') === 0) {
            $description = 'Conheça o serviço de ' . $pageTitle . ' da Metrocal para garantir desempenho, conformidade e segurança operacional.';
        } elseif (strpos($pageFolder, 'pages/Outros') === 0) {
            $description = 'Conheça o serviço de ' . $pageTitle . ' da Metrocal e veja como podemos apoiar o seu laboratório com soluções metrológicas especializadas.';
        } else {
            $description = 'Conheça a Metrocal e nossas soluções em calibração, qualificação, assistência técnica e metrologia.';
        }

        return array(
            'title' => $pageTitle . ' | Metrocal',
            'description' => $description,
        );
    }
}

define('BASE_URL', metrocal_detect_base_url());
?>
