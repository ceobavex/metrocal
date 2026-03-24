<?php
// Arquivo: header.php
// Inclui o arquivo de configuração para ter acesso à BASE_URL
// MUDANÇA AQUI: Usando um caminho relativo que funciona em qualquer servidor
require_once(__DIR__ . '/../config.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Metrocal - Soluções em Calibração e Metrologia">
    <title>Metrocal - Calibração & Assistência Técnica</title>
    
    <link rel="icon" href="<?php echo BASE_URL; ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo BASE_URL; ?>img/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="header" id="header">
        <nav class="nav">
            <div class="container nav-container">
                <a href="<?php echo BASE_URL; ?>index.php" class="logo">
                    <img src="<?php echo BASE_URL; ?>img/metrocal2.png" alt="Metrocal - Serviços de Metrologia" class="logo-img">
                </a>
                
                <ul class="nav-menu" id="navMenu">
                    <li><a href="<?php echo BASE_URL; ?>index.php" class="nav-link">Início</a></li>
                    <li><a href="<?php echo BASE_URL; ?>pages/sobre.php" class="nav-link">Sobre</a></li>
                    
                    <li class="menu-item-has-mega">
                        <a href="<?php echo BASE_URL; ?>pages/servicos.php" class="nav-link">Serviços <span class="dropdown-arrow">▼</span></a>
                        
                        <div class="mega-menu">
                            <div class="mega-menu-content">
                                <div class="mega-menu-column">
                                    <h4 class="mega-menu-title">Calibração</h4>
                                    <ul class="mega-menu-list">
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-instrumentos.php">Calibração de instrumentos</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-autoclave.php">Calibração de autoclave</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-densimetro.php">Calibração de densímetro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-equipamentos-de-laboratorio.php">Calibração de equipamentos de laboratório</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-pHmetro.php">Calibração de pHmetro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-espectrofotometro.php">Calibração espectrofotômetro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-centrifuga.php">Calibração de centrífuga</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-condutivimetro.php">Calibração de condutivímetro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-turbidimetro.php">Calibração de turbidímetro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-estufa.php">Calibração estufa</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-densimetro-digital.php">Calibração de densímetro digital</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-equipamentos-de-medicao.php">Calibração de equipamentos de medição</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-instrumentos-de-medicao.php">Calibração de instrumentos de medição</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-espectrofotometro-uv-vis.php">Calibração de espectrofotômetro uv-vis</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-de-medidor-de-pH.php">Calibração de medidor de pH</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Calibracao/Calibracao-e-manutencao-de-instrumentos-de-medicao.php">Calibração e manutenção de instrumentos de medição</a></li>
                                    </ul>
                                </div>
                                
                                <div class="mega-menu-column">
                                    <h4 class="mega-menu-title">Assistência Técnica</h4>
                                    <ul class="mega-menu-list">
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/assistencia-tecnica-autoclave.php">Assistência técnica autoclave</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/assistencia-tecnica-estufa.php">Assistência técnica estufa</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/assistencia-tecnica-micronal.php">Assistência técnica micronal</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/assistencia-tecnica-equipamentos-laboratorio.php">Assistência técnica equipamentos laboratório</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/assistencia-tecnica-espectrofotometro.php">Assistência técnica espectrofotômetro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/manutencao-preventiva.php">Manutenção preventiva</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/manutencao-phmetro.php">Manutenção pHmetro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/manutencao-fotometro-chama.php">Manutenção de fotômetro de chama</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Assistencia-Tecnica/manutencao-preventiva-e-calibracao.php">Manutenção preventiva e calibração de equipamentos</a></li>
                                    </ul>
                                </div>
                                
                                <div class="mega-menu-column">
                                    <h4 class="mega-menu-title">Qualificação</h4>
                                    <ul class="mega-menu-list">
                                        <li><a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-autoclaves.php">Qualificação autoclave</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-camara-climatica.php">Qualificação câmara climática</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-espectrofotometro.php">Qualificação espectrofotômetro</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-termica.php">Qualificação térmica</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-binder.php">Qualificação binder</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-de-estufas.php">Qualificação de estufas</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-termica-autoclave.php">Qualificação térmica autoclave</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Qualificacao/qualificacao-capela-fluxo-laminar.php">Qualificação de Capela de Fluxo Laminar</a></li>
                                    </ul>
                                </div>
                                
                                <div class="mega-menu-column">
                                    <h4 class="mega-menu-title">Outros Serviços</h4>
                                    <ul class="mega-menu-list">
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/afericao-de-equipamentos.php">Aferição de equipamentos</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/afericao-de-instrumentos.php">Aferição de instrumentos</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/afericao-de-equipamentos-de-medicao.php">Aferição de equipamentos de medição</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/afericao-de-instrumentos-de-medicao.php">Aferição de instrumentos de medição</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/calibracao-camara-climatica.php">Câmara climática calibração</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/calibracao-micronal.php">Micronal calibração</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/servico-de-calibracao-de-instrumentos.php">Serviço de calibração de instrumentos</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/treinamentos-tecnicos.php">Treinamentos técnicos</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>pages/Outros/consultoria-em-metrologia.php">Consultoria em metrologia</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li><a href="<?php echo BASE_URL; ?>pages/escopos.php" class="nav-link">Escopos</a></li>
                    <li><a href="<?php echo BASE_URL; ?>pages/orcamento.php" class="nav-link nav-link-cta-secondary">Solicite Seu Orçamento</a></li>
                    <li><a href="http://totallab.arkmeds.com/usuarios/conectar?next=/" class="nav-link nav-link-cta">Acesse Seu Certificado</a></li>
                </ul>
                
                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </nav>
    </header>