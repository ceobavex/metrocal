<?php
if (!isset($serviceTitle)) {
    exit;
}

$pageTitle = isset($pageTitle) ? $pageTitle : $serviceTitle . ' | Metrocal';
$pageDescription = isset($pageDescription)
    ? $pageDescription
    : 'Conheça o serviço de ' . $serviceTitle . ' da Metrocal, com atendimento especializado, agilidade e suporte técnico.';
$serviceLead = isset($serviceLead) ? $serviceLead : '';
$serviceDescription = isset($serviceDescription) ? $serviceDescription : '';
$serviceImportanceTitle = isset($serviceImportanceTitle) ? $serviceImportanceTitle : 'Por que este serviço é importante?';
$serviceImportanceText = isset($serviceImportanceText) ? $serviceImportanceText : '';
$serviceBenefitsTitle = isset($serviceBenefitsTitle) ? $serviceBenefitsTitle : 'Diferenciais do nosso serviço:';
$serviceBenefits = isset($serviceBenefits) && is_array($serviceBenefits) ? $serviceBenefits : array();
$serviceCtaTitle = isset($serviceCtaTitle) ? $serviceCtaTitle : 'Precisa falar com a Metrocal?';
$serviceCtaText = isset($serviceCtaText) ? $serviceCtaText : 'Fale com nossos especialistas e solicite uma proposta personalizada.';
$serviceAdditionalParagraphs = isset($serviceAdditionalParagraphs) && is_array($serviceAdditionalParagraphs)
    ? $serviceAdditionalParagraphs
    : array();

include __DIR__ . '/../components/header.php';
?>

<main>
    <section class="page-header-service">
        <div class="container">
            <h1><?php echo htmlspecialchars($serviceTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
        </div>
    </section>

    <section class="service-content-wrapper">
        <div class="container service-content">
            <p class="sobre-lead">
                <?php echo htmlspecialchars($serviceLead, ENT_QUOTES, 'UTF-8'); ?>
            </p>

            <p>
                <?php echo htmlspecialchars($serviceDescription, ENT_QUOTES, 'UTF-8'); ?>
            </p>

            <?php foreach ($serviceAdditionalParagraphs as $paragraph): ?>
                <p>
                    <?php echo htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8'); ?>
                </p>
            <?php endforeach; ?>

            <h3><?php echo htmlspecialchars($serviceImportanceTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
            <p>
                <?php echo htmlspecialchars($serviceImportanceText, ENT_QUOTES, 'UTF-8'); ?>
            </p>

            <?php if (!empty($serviceBenefits)): ?>
                <h3><?php echo htmlspecialchars($serviceBenefitsTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
                <ul>
                    <?php foreach ($serviceBenefits as $benefit): ?>
                        <li><?php echo htmlspecialchars($benefit, ENT_QUOTES, 'UTF-8'); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </section>

    <section class="cta-section-service">
        <div class="container">
            <h2 class="section-title" style="font-size: 2rem;"><?php echo htmlspecialchars($serviceCtaTitle, ENT_QUOTES, 'UTF-8'); ?></h2>
            <p class="section-description" style="margin-top: -20px;">
                <?php echo htmlspecialchars($serviceCtaText, ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <br>
            <a href="<?php echo BASE_URL; ?>pages/orcamento.php" class="btn btn-primary">Solicitar Orçamento Agora</a>
        </div>
    </section>
</main>

<?php
include __DIR__ . '/../components/footer.php';
?>
