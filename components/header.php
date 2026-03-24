<?php
// Arquivo: header.php
// Inclui o arquivo de configuração para ter acesso à BASE_URL
// MUDANÇA AQUI: Usando um caminho relativo que funciona em qualquer servidor
require_once(__DIR__ . '/../config.php');

$pageMeta = metrocal_get_page_meta();
$pageTitle = isset($pageTitle) ? $pageTitle : $pageMeta['title'];
$pageDescription = isset($pageDescription) ? $pageDescription : $pageMeta['description'];
$serviceCategories = metrocal_get_service_categories();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    
    <link rel="icon" href="<?php echo BASE_URL; ?>img/favicon.png" type="image/png">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>img/favicon.png" type="image/png">
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
                                <?php foreach ($serviceCategories as $category): ?>
                                    <div class="mega-menu-column">
                                        <h4 class="mega-menu-title"><?php echo htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                                        <ul class="mega-menu-list">
                                            <?php foreach ($category['items'] as $item): ?>
                                                <li>
                                                    <a href="<?php echo htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>">
                                                        <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>
                    
                    <li><a href="<?php echo BASE_URL; ?>pages/escopos.php" class="nav-link">Escopos</a></li>
                    <li><a href="<?php echo BASE_URL; ?>pages/orcamento.php" class="nav-link nav-link-cta-secondary">Solicite Seu Orçamento</a></li>
                    <li><a href="https://totallab.arkmeds.com/usuarios/conectar?next=/" class="nav-link nav-link-cta" target="_blank" rel="noopener noreferrer">Acesse Seu Certificado</a></li>
                </ul>
                
                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </nav>
    </header>
