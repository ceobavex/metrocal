<?php
// Arquivo: escopos.php
// Caminho do include corrigido para ser mais portável
include '../components/header.php';

$scopeCategories = metrocal_get_scope_categories();
?>

<main>
    <section class="page-header-service">
        <div class="container">
            <h1>Nossos Escopos de Calibração</h1>
        </div>
    </section>

    <section class="scopes-wrapper">
        <div class="container">
            <div class="search-container">
                <input type="text" id="instrumento-search" placeholder="🔎 Digite o nome do instrumento para pesquisar...">
            </div>

            <div id="no-results-message">
                <p>Nenhum instrumento encontrado.</p>
            </div>

            <?php foreach ($scopeCategories as $category): ?>
                <div class="category-block">
                    <h2 class="category-title"><?php echo htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <ul class="instrument-list">
                        <?php foreach ($category['items'] as $item): ?>
                            <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('instrumento-search');
    const categoryBlocks = document.querySelectorAll('.category-block');
    const noResultsMessage = document.getElementById('no-results-message');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let totalVisibleItems = 0;

        categoryBlocks.forEach(block => {
            const listItems = block.querySelectorAll('.instrument-list li');
            let visibleItemsInCategory = 0;

            listItems.forEach(item => {
                const itemText = item.textContent.toLowerCase();
                if (itemText.includes(searchTerm)) {
                    item.style.display = '';
                    visibleItemsInCategory++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (visibleItemsInCategory > 0) {
                block.style.display = '';
                totalVisibleItems += visibleItemsInCategory;
            } else {
                block.style.display = 'none';
            }
        });

        if (totalVisibleItems === 0 && searchTerm !== '') {
            noResultsMessage.style.display = 'block';
        } else {
            noResultsMessage.style.display = 'none';
        }
    });
});
</script>

<?php
// Caminho do include corrigido para ser mais portável
include '../components/footer.php';
?>
