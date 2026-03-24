<?php
// Caminho do include corrigido para ser mais portável
include '../components/header.php';

$serviceCategories = metrocal_get_service_categories();
?>

<main>
    <section class="page-header-service">
        <div class="container">
            <h1>Nossos Serviços</h1>
        </div>
    </section>

    <section class="service-content-wrapper">
        <div class="container">
            <?php foreach ($serviceCategories as $category): ?>
                <?php $categorySlug = metrocal_slugify($category['title']); ?>
                <div class="service-hub-section" id="<?php echo $categorySlug; ?>">
                    <h2 class="category-title"><?php echo htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <div class="service-hub-grid">
                        <?php foreach ($category['items'] as $item): ?>
                            <a href="<?php echo htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>" class="service-hub-card">
                                <h3><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php
// Caminho do include corrigido para ser mais portável
include '../components/footer.php';
?>
