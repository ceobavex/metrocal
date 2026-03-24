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
