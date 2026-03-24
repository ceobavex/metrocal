<?php
// Caminho do include corrigido para ser mais portável
include '../components/header.php'; 
?>

<style>
    /* Estilos específicos para a página hub de serviços */
    .service-hub-section {
        padding-bottom: 60px;
    }
    .category-title {
        font-size: 2.2rem;
        color: var(--azul-escuro);
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 3px solid var(--azul-principal);
    }
    .service-hub-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }
    .service-hub-card {
        display: block;
        background: var(--branco);
        padding: 25px;
        border-radius: 10px;
        box-shadow: var(--sombra);
        text-decoration: none;
        color: var(--texto-escuro);
        transition: all 0.3s ease;
        border-left: 5px solid var(--azul-principal);
    }
    .service-hub-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 102, 204, 0.15);
        border-left-color: var(--azul-hover);
    }
    .service-hub-card h3 {
        font-size: 1.1rem;
        color: var(--azul-escuro);
    }
</style>

<main>
    <section class="page-header-service">
        <div class="container">
            <h1>Nossos Serviços</h1>
        </div>
    </section>

    <section class="service-content-wrapper">
        <div class="container">

            <div class="service-hub-section">
                <h2 class="category-title">Calibração</h2>
                <div class="service-hub-grid">
                    <?php
                    $calibracao_links = [
                        'Calibração de Instrumentos' => 'pages/Calibracao/Calibracao-de-instrumentos.php',
                        'Calibração de Autoclave' => 'pages/Calibracao/Calibracao-de-autoclave.php',
                        'Calibração de Densímetro' => 'pages/Calibracao/Calibracao-de-densimetro.php',
                        'Calibração de Equipamentos de Laboratório' => 'pages/Calibracao/Calibracao-de-equipamentos-de-laboratorio.php',
                        'Calibração de pHmetro' => 'pages/Calibracao/Calibracao-de-pHmetro.php',
                        'Calibração de Espectrofotômetro' => 'pages/Calibracao/Calibracao-de-espectrofotometro.php',
                        'Calibração de Centrífuga' => 'pages/Calibracao/Calibracao-de-centrifuga.php',
                        'Calibração de Condutivímetro' => 'pages/Calibracao/Calibracao-de-condutivimetro.php',
                        'Calibração de Turbidímetro' => 'pages/Calibracao/Calibracao-de-turbidimetro.php',
                        'Calibração de Estufa' => 'pages/Calibracao/Calibracao-de-estufa.php',
                        'Calibração de Densímetro Digital' => 'pages/Calibracao/Calibracao-de-densimetro-digital.php',
                        'Calibração de Equipamentos de Medição' => 'pages/Calibracao/Calibracao-de-equipamentos-de-medicao.php',
                        'Calibração de Instrumentos de Medição' => 'pages/Calibracao/Calibracao-de-instrumentos-de-medicao.php',
                        'Calibração de Espectrofotômetro UV-VIS' => 'pages/Calibracao/Calibracao-de-espectrofotometro-uv-vis.php',
                        'Calibração de Medidor de pH' => 'pages/Calibracao/Calibracao-de-medidor-de-ph.php',
                        'Calibração e Manutenção de Instrumentos' => 'pages/Calibracao/Calibracao-e-manutencao-de-instrumentos-de-medicao.php',
                    ];
                    foreach ($calibracao_links as $title => $link) {
                        // Caminhos corrigidos para usar a BASE_URL
                        echo '<a href="' . BASE_URL . $link . '" class="service-hub-card"><h3>' . $title . '</h3></a>';
                    }
                    ?>
                </div>
            </div>

            <div class="service-hub-section">
                <h2 class="category-title">Assistência Técnica e Manutenção</h2>
                <div class="service-hub-grid">
                    <?php
                    $assistencia_links = [
                        'Assistência Técnica em Autoclave' => 'pages/Assistencia-Tecnica/assistencia-tecnica-autoclave.php',
                        'Assistência Técnica em Estufa' => 'pages/Assistencia-Tecnica/assistencia-tecnica-estufa.php',
                        'Assistência Técnica Micronal' => 'pages/Assistencia-Tecnica/assistencia-tecnica-micronal.php',
                        'Assistência Técnica em Equipamentos de Laboratório' => 'pages/Assistencia-Tecnica/assistencia-tecnica-equipamentos-laboratorio.php',
                        'Assistência Técnica em Espectrofotômetro' => 'pages/Assistencia-Tecnica/assistencia-tecnica-espectrofotometro.php',
                        'Manutenção Preventiva' => 'pages/Assistencia-Tecnica/manutencao-preventiva.php',
                        'Manutenção de pHmetro' => 'pages/Assistencia-Tecnica/manutencao-phmetro.php',
                        'Manutenção de Fotômetro de Chama' => 'pages/Assistencia-Tecnica/manutencao-fotometro-chama.php',
                        'Manutenção Preventiva e Calibração' => 'pages/Assistencia-Tecnica/manutencao-preventiva-e-calibracao.php',
                    ];
                    foreach ($assistencia_links as $title => $link) {
                        // Caminhos corrigidos para usar a BASE_URL
                        echo '<a href="' . BASE_URL . $link . '" class="service-hub-card"><h3>' . $title . '</h3></a>';
                    }
                    ?>
                </div>
            </div>

            <div class="service-hub-section">
                <h2 class="category-title">Qualificação</h2>
                <div class="service-hub-grid">
                    <?php
                    $qualificacao_links = [
                        'Qualificação de Autoclave' => 'pages/Qualificacao/qualificacao-autoclaves.php',
                        'Qualificação de Câmara Climática' => 'pages/Qualificacao/qualificacao-camara-climatica.php',
                        'Qualificação de Espectrofotômetro' => 'pages/Qualificacao/qualificacao-espectrofotometro.php',
                        'Qualificação Térmica' => 'pages/Qualificacao/qualificacao-termica.php',
                        'Qualificação de Equipamentos Binder' => 'pages/Qualificacao/qualificacao-binder.php',
                        'Qualificação de Estufas' => 'pages/Qualificacao/qualificacao-de-estufas.php',
                        'Qualificação Térmica de Autoclave' => 'pages/Qualificacao/qualificacao-termica-autoclave.php',
                        'Qualificação de Capela de Fluxo Laminar' => 'pages/Qualificacao/qualificacao-capela-fluxo-laminar.php',
                    ];
                    foreach ($qualificacao_links as $title => $link) {
                        // Caminhos corrigidos para usar a BASE_URL
                        echo '<a href="' . BASE_URL . $link . '" class="service-hub-card"><h3>' . $title . '</h3></a>';
                    }
                    ?>
                </div>
            </div>

             <div class="service-hub-section">
                <h2 class="category-title">Outros Serviços</h2>
                <div class="service-hub-grid">
                    <?php
                    $outros_servicos_links = [
                        'Aferição de Equipamentos' => 'pages/Outros/afericao-de-equipamentos.php',
                        'Aferição de Instrumentos' => 'pages/Outros/afericao-de-instrumentos.php',                        
                        'Aferição de equipamentos de medição' => 'pages/Outros/afericao-de-equipamentos-de-medicao.php',
                        'Aferição de instrumentos de medição' => 'pages/Outros/afericao-de-instrumentos-de-medicao.php',
                        'Calibração de Câmara Climática' => 'pages/Outros/calibracao-camara-climatica.php',
                        'Calibração de Equipamentos Micronal' => 'pages/Outros/calibracao-micronal.php',
                        'Serviço de calibração de instrumentos' => 'pages/Outros/servico-de-calibracao-de-instrumentos.php',
                        'Treinamentos Técnicos' => 'pages/Outros/treinamentos-tecnicos.php',
                        'Consultoria em Metrologia' => 'pages/Outros/consultoria-em-metrologia.php',
                    ];
                    foreach ($outros_servicos_links as $title => $link) {
                        // Caminhos corrigidos para usar a BASE_URL
                        echo '<a href="' . BASE_URL . $link . '" class="service-hub-card"><h3>' . $title . '</h3></a>';
                    }
                    ?>
                </div>
            </div>

        </div>
    </section>
</main>

<?php
// Caminho do include corrigido para ser mais portável
include '../components/footer.php'; 
?>